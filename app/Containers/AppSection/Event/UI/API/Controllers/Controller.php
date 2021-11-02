<?php

namespace App\Containers\AppSection\Event\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Event\Actions\GetAllEventsAction;
use App\Containers\AppSection\Event\UI\API\Requests\GetAllEventsRequest;
use App\Containers\AppSection\Event\UI\API\Transformers\EventTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @throws InvalidTransformerException|RepositoryException
     */
    public function getAllEvents(GetAllEventsRequest $request): array
    {
        $events = app(GetAllEventsAction::class)->run($request);
        return $this->transform($events, EventTransformer::class);
    }


}
