<?php

namespace App\Containers\AppSection\Event\Data\Factories;

use App\Containers\AppSection\City\Data\Repositories\CityRepository;
use App\Containers\AppSection\Event\Models\Event;
use App\Ship\Parents\Factories\Factory;
use Carbon\Carbon;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        $repository = app(CityRepository::class);
        $start_date = $this->faker->date;
        $created_at = now();
        $end_date = Carbon::parse($start_date)->addMonths($this->faker->numberBetween(1, 5));
        return [
            'city_id' => $repository->inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'created_at' => $created_at,
        ];
    }
}
