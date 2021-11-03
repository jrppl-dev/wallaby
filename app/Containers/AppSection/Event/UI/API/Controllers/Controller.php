<?php

namespace App\Containers\AppSection\Event\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Event\Actions\GetAllEventsAction;
use App\Containers\AppSection\Event\UI\API\Requests\GetAllEventsRequest;
use App\Containers\AppSection\Event\UI\API\Transformers\EventTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Logger;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @throws InvalidTransformerException|RepositoryException
     */
    public function getAllEvents(GetAllEventsRequest $request): array
    {
        $log = Logger::request()->log();
        $events = app(GetAllEventsAction::class)->run($request);
        Logger::entry($log)->response(['events' => count($events)]);
        return $this->transform($events, EventTransformer::class);
    }


}
