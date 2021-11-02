<?php

namespace App\Containers\AppSection\Event\Models;

use App\Containers\AppSection\City\Models\City;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{

    protected $fillable = [
        'name',
        'city_id',
        'start_date',
        'end_date',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

}
