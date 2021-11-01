<?php

namespace App\Containers\AppSection\Country\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class CountryRepository extends Repository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'created_at' => 'like',
        'updated_at' => 'like',
    ];

}
