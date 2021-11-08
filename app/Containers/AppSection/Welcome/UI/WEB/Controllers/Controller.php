<?php

namespace App\Containers\AppSection\Welcome\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
	public function sayWelcome()
	{
		return view('appSection@welcome::welcome-page');
	}
}
