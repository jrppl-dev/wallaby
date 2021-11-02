<?php

namespace App\Containers\AppSection\Country\Models;

use App\Containers\AppSection\City\Models\City;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
