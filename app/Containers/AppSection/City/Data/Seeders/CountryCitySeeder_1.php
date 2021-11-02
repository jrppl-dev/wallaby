<?php

namespace App\Containers\AppSection\City\Data\Seeders;

use App\Containers\AppSection\City\Models\City;
use App\Containers\AppSection\Country\Models\Country;
use App\Ship\Parents\Seeders\Seeder;
use Carbon\Carbon;
use Exception;
use Http;
use Psr\SimpleCache\InvalidArgumentException;

class CountryCitySeeder_1 extends Seeder
{
    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function run(): void
    {
        $cache_key = cache_key('run', CountryCitySeeder_1::class);

        if (!cache()->has($cache_key)) {
            $response = Http::get("https://countriesnow.space/api/v0.1/countries");
            cache([$cache_key => collect($response->json('data'))->random(100)], now()->addMinutes(15));
        }

        $data = cache($cache_key);
        Country::truncate();
        City::truncate();
        $cities = [];
        $created_at = Carbon::now();

        foreach ($data as $entry) {
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
