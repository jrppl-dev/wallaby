<?php

namespace App\Containers\AppSection\Event\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class EventRepository extends Repository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'created_at' => 'like',
        'updated_at' => 'like',
    ];

}
