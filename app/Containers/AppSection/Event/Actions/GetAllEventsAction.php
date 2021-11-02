<?php

namespace App\Containers\AppSection\Event\Actions;

use App\Containers\AppSection\Event\Tasks\GetAllEventsTask;
use App\Containers\AppSection\Event\UI\API\Requests\GetAllEventsRequest;
use App\Ship\Parents\Actions\Action;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllEventsAction extends Action
{
    /**
     * @throws RepositoryException
     */
    public function run(GetAllEventsRequest $request)
    {
        $task = app(GetAllEventsTask::class);
        if ($request->has('term')) {
            $task->addTermCriteria($request->get('term'));
        }
        if ($request->has('date')) {
            $task->addBetweenDate($request->get('date'));
        }
        return $task->addRequestCriteria()->ordered()->run();
    }
}
