<?php

namespace App\Containers\AppSection\Welcome\Actions;

use App\Ship\Parents\Actions\Action;

class FindMessageForApiRootVisitorAction extends Action
{
    public function run(): array
    {
        return ['Welcome to Apiato'];
    }
}
