<?php

namespace App\Providers;

use App\Library\Services\DemoOne;
use App\Library\Services\DemoTwo;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Contracts\CustomServiceInterface', function ($app) {
            return new DemoTwo();
        });

        $this->app->bind('demoOne', function($app) {
           return new DemoOne();
        });
    }

    public function provides()
    {
        return [DemoTwo::class];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
