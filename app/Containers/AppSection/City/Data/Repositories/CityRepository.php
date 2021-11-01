<?php

namespace App\Containers\AppSection\City\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class CityRepository extends Repository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'created_at' => 'like',
        'updated_at' => 'like',
    ];

}
