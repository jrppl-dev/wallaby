<?php

namespace App\Containers\AppSection\City\Data\Seeders;

use App\Containers\AppSection\City\Models\City;
use App\Containers\AppSection\Country\Models\Country;
use App\Ship\Parents\Seeders\Seeder;
use Carbon\Carbon;
use Http;

class CountryCitySeeder_1 extends Seeder
{
    public function run(): void
    {
        $response = Http::get("https://countriesnow.space/api/v0.1/countries");
        Country::truncate();
        City::truncate();
        $cities = [];
        $created_at = Carbon::now();
        foreach (collect($response->json('data'))->take(50) as $entry) {
            $country = Country::create([
                'name' => $entry['country']
            ]);
            foreach ($entry['cities'] as $cityName) {
                $cities[] = [
                    'name' => $cityName,
                    'country_id' => $country->id,
                    'created_at' => $created_at
                ];
            }
        }
        City::insert($cities);
    }
}
