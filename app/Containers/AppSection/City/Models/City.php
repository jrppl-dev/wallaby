<?php

namespace App\Containers\AppSection\City\Models;

use App\Ship\Parents\Models\UserModel;

class City extends UserModel
{

    protected $fillable = [
        'name',
        'country_id'
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

}
