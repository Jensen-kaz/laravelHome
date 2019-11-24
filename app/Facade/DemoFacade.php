<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class DemoFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'demoOne';
    }
}
