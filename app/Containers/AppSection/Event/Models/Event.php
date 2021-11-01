<?php

namespace App\Containers\AppSection\Event\Models;

use App\Ship\Parents\Models\UserModel;

class Event extends UserModel
{

    protected $fillable = [
        'name',
        'city_id',
        'start_date',
        'end_date',
    ];

    protected $hidden = [
    ];

    protected $casts = [
    ];

}
