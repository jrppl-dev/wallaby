<?php

namespace App\Containers\AppSection\Welcome\Actions;

use App\Ship\Parents\Actions\Action;

class FindMessageForApiV1VisitorAction extends Action
{
    public function run(): array
    {
        return ['Welcome to Apiato (API V1)'];
    }
}
