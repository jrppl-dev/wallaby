<?php

namespace App\Containers\AppSection\Event\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Event\Data\Criterias\CityAndCountryLikeTermCriteria;
use App\Containers\AppSection\Event\Data\Criterias\CityOrCountryLikeTermCriteria;
use App\Containers\AppSection\Event\Data\Criterias\StartBetweenEndDateCriteria;
use App\Containers\AppSection\Event\Exceptions\InvalidDateException;
use App\Containers\AppSection\Event\Exceptions\LowerThanTodayDateException;
use App\Containers\AppSection\Event\Tasks\GetAllEventsTask;
use App\Containers\AppSection\Event\UI\API\Requests\GetAllEventsRequest;
use App\Ship\Parents\Actions\Action;
use Illuminate\Pagination\LengthAwarePaginator;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllEventsAction extends Action
{
    /**
     * @param GetAllEventsRequest $request
     * @return LengthAwarePaginator
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     * @throws InvalidDateException
     * @throws LowerThanTodayDateException
     */
    public function run(GetAllEventsRequest $request): LengthAwarePaginator
    {
        $task = app(GetAllEventsTask::class);

        if ($request->has('date')) {
            $task->pushCriteria(new StartBetweenEndDateCriteria($request->get('date')));
        }

        if ($request->has('term')) {
            $task->pushCriteria(new CityAndCountryLikeTermCriteria($request->get('term')));
        }

        if (!$this->hasResults($task) && $request->has('term')) {
            $task->popCriteria(new CityAndCountryLikeTermCriteria($request->get('term')));
            $task->pushCriteria(new CityOrCountryLikeTermCriteria($request->get('term')));
        }

        return $task->addRequestCriteria()->ordered()->run();
    }

    private function hasResults($task)
    {
        return $task->count() > 0;
    }
}
