<?php

namespace App\Containers\AppSection\Event\Data\Seeders;

use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Seeders\Seeder;

class EventUserSeeder_4 extends Seeder
{
    /**
     * @throws CreateResourceFailedException
     */
    public function run(): void
    {
        $user = app(FindUserByIdTask::class)->run(1);
        $user->givePermissionTo(['list-events']);
    }
}
