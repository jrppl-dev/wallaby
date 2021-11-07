<?php

namespace App\Containers\AppSection\Event\Data\Seeders;

use App\Containers\AppSection\Event\Models\Event;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder;

class EventDefaultSeeder_4 extends Seeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $entries = Event::factory()->count(250)->make()->toArray();
        for ($i = 0; $i <= 25; $i++) {
            Event::insert($entries);
        }
    }
}
