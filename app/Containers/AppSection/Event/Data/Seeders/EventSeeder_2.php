<?php

namespace App\Containers\AppSection\Event\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Containers\AppSection\Event\Models\Event;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder;

class EventSeeder_2 extends Seeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        Event::insert(Event::factory()->count(13000)->make()->toArray());
        $createPermissionTask = app(CreatePermissionTask::class);
        $createPermissionTask->run(
            'list-events',
            'Get all events.'
        );
    }
}
