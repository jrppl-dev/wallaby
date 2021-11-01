<?php

namespace App\Containers\AppSection\User\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreatePermissionTask;
use App\Ship\Parents\Seeders\Seeder;

class UserPermissionsSeeder_1 extends Seeder
{
    public function run(): void
    {
        // Default Permissions ----------------------------------------------------------
        $createPermissionTask = app(CreatePermissionTask::class);
        $createPermissionTask->run('search-users', 'Find a City in the DB.');
        $createPermissionTask->run('list-users', 'Get All Users.');
        $createPermissionTask->run('update-users', 'Update a City.');
        $createPermissionTask->run('delete-users', 'Delete a City.');
        $createPermissionTask->run('refresh-users', 'Refresh City data.');
    }
}
