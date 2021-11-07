<?php

namespace App\Containers\AppSection\Event\Tests\Unit;

use App\Containers\AppSection\Authentication\Tests\TestCase;
use App\Containers\AppSection\Event\Actions\GetAllEventsAction;
use App\Containers\AppSection\Event\Data\Criterias\CityAndCountryLikeTermCriteria;
use App\Containers\AppSection\Event\Data\Criterias\CityOrCountryLikeTermCriteria;
use App\Containers\AppSection\Event\Data\Criterias\StartBetweenEndDateCriteria;
use App\Containers\AppSection\Event\Exceptions\InvalidDateException;
use App\Containers\AppSection\Event\Exceptions\LowerThanTodayDateException;
use App\Containers\AppSection\Event\Models\Event;
use App\Containers\AppSection\Event\Tasks\GetAllEventsTask;
use App\Containers\AppSection\Event\UI\API\Requests\GetAllEventsRequest;
use Illuminate\Database\Eloquent\Builder;

class GetEventsTest extends TestCase
{
    public function testGetAllEvents()
    {
        $results = app(GetAllEventsTask::class)->run();
        $this->assertTrue($results->total() === Event::count());
    }

    public function testGetEventsUsingTermAndCondition()
    {
        $term = "ted";
        $results = app(GetAllEventsTask::class)
            ->pushCriteria(new CityAndCountryLikeTermCriteria($term))
            ->run();
        $this->assertTrue($results->total() === Event::where(function ($query) use ($term) {
                $query->whereHas('city.country', function ($q) use ($term) {
                    $q->where('name', 'like', "%$term%");
                })->whereHas('city', function ($q) use ($term) {
                    $q->where('name', 'like', "%$term%");
                });
            })->count());
    }

    public function testGetEventsUsingTermOrCondition()
    {
        $term = "ted";
        $results = app(GetAllEventsTask::class)
            ->pushCriteria(new CityOrCountryLikeTermCriteria($term))
            ->run();
        $this->assertTrue($results->total() === Event::where(function ($query) use ($term) {
                $query->whereHas('city.country', function ($q) use ($term) {
                    $q->where('name', 'like', "%$term%");
                })->orWhereHas('city', function ($q) use ($term) {
                    $q->where('name', 'like', "%$term%");
                });
            })->count());
    }

    public function testGetEventsUsingDate()
    {
        $date = "2021-11-09";
        $results = app(GetAllEventsTask::class)
            ->pushCriteria(new StartBetweenEndDateCriteria($date))
            ->run();
        $this->assertTrue($results->total() === Event::where(function ($query) use ($date) {
                $query
                    ->whereRaw('? between start_date and end_date', [$date])
                    ->orWhere(function ($sub_query) use ($date) {
                        $sub_query
                            ->where('start_date', '<=', $date)
                            ->whereNull('end_date');
                    });
            })->count());
    }

    public function testGetEventsUsingDateAndTerm()
    {
        $date = "2021-11-09";
        $term = "ted";
        $results = app(GetAllEventsAction::class)->run(new GetAllEventsRequest([
            'date' => $date,
            'term' => $term,
        ]));

        $query = $this->getDateQuery($date);

        $sub_query = $this->appendCityAndCountryQuery(clone $query, $term);

        if ($sub_query->count() === 0) {
            $sub_query = $this->appendCityOrCountryQuery(clone $query, $term);
        }

        $this->assertTrue($results->total() === $sub_query->count());
    }

    private function getDateQuery($date)
    {
        return Event::where(function ($query) use ($date) {
            $query
                ->whereRaw('? between start_date and end_date', [$date])
                ->orWhere(function ($sub_query) use ($date) {
                    $sub_query
                        ->where('start_date', '<=', $date)
                        ->whereNull('end_date');
                });
        });
    }

    private function appendCityAndCountryQuery(Builder $query, string $term): Builder
    {
        return $query->where(function ($query) use ($term) {
            $query->whereHas('city.country', function ($q) use ($term) {
                $q->where('name', 'like', "%$term%");
            })->whereHas('city', function ($q) use ($term) {
                $q->where('name', 'like', "%$term%");
            });
        });
    }

    private function appendCityOrCountryQuery(Builder $query, string $term): Builder
    {
        return $query->where(function ($query) use ($term) {
            $query->whereHas('city.country', function ($q) use ($term) {
                $q->where('name', 'like', "%$term%");
            })->orWhereHas('city', function ($q) use ($term) {
                $q->where('name', 'like', "%$term%");
            });
        });
    }

    public function testInvalidDateThrowException()
    {
        $this->expectException(InvalidDateException::class);
        app(GetAllEventsAction::class)->run(new GetAllEventsRequest([
            'date' => '2021-21-01',
        ]));
    }

    public function testDateLowerThanTodayThrowException()
    {
        $this->expectException(LowerThanTodayDateException::class);
        app(GetAllEventsAction::class)->run(new GetAllEventsRequest([
            'date' => '2021-11-01',
        ]));
    }
}

