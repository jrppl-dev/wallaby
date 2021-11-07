<?php

namespace App\Containers\AppSection\Event\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder;

class EventPermissionsSeeder_4 extends Seeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $createPermissionTask = app(CreatePermissionTask::class);
        $createPermissionTask->run('list-events', 'Get all events.');
    }
}
