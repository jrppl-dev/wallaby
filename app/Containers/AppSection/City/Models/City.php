<?php

namespace App\Containers\AppSection\City\Models;

use App\Containers\AppSection\Country\Models\Country;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{

    protected $fillable = [
        'name',
        'country_id'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

}
