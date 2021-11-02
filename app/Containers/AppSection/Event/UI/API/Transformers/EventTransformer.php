<?php

namespace App\Containers\AppSection\Event\UI\API\Transformers;

use App\Containers\AppSection\Event\Models\Event;
use App\Ship\Parents\Transformers\Transformer;

class EventTransformer extends Transformer
{
    protected $availableIncludes = [
        'roles',
    ];

    protected $defaultIncludes = [

    ];

    public function transform(Event $event): array
    {
        $response = [
            'object' => $event->getResourceKey(),
            'id' => $event->getHashedKey(),
            'name' => $event->name,
            'city' => $event->city?->name,
            'country' => $event->city?->country?->name,
            'start_date' => $event->start_date,
            'end_date' => $event->end_date,
        ];

        return $response;
    }

}
