<?php

namespace App\Containers\AppSection\Event\Data\Seeders;

use App\Containers\AppSection\Event\Models\Event;
use App\Ship\Parents\Seeders\Seeder;

class EventSeeder_2 extends Seeder
{
    public function run(): void
    {
        Event::insert(Event::factory()->count(13000)->make()->toArray());
    }
}
