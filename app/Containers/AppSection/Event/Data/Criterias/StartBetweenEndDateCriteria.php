<?php

namespace App\Containers\AppSection\Event\Data\Criterias;

use App\Containers\AppSection\Event\Exceptions\InvalidDateException;
use App\Containers\AppSection\Event\Exceptions\LowerThanTodayDateException;
use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class StartBetweenEndDateCriteria extends Criteria
{
    private string $date;

    /**
     * @throws InvalidDateException
     * @throws LowerThanTodayDateException
     */
    public function __construct($date)
    {
        if (\Validator::make([
            'date' => $date
        ], [
            'date' => 'date|date_format:Y-m-d',
        ])->fails()) {
            throw new InvalidDateException();
        }
        if (\Validator::make([
            'date' => $date
        ], [
            'date' => 'date|date_format:Y-m-d|after:today',
        ])->fails()) {
            throw new LowerThanTodayDateException();
        }
        $this->date = $date;

    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model
            ->where(function ($query) {
                $query
                    ->whereRaw('? between start_date and end_date', [$this->date])
                    ->orWhere(function ($sub_query) {
                        $sub_query
                            ->where('start_date', '<=', $this->date)
                            ->whereNull('end_date');
                    });
            });

    }
}
