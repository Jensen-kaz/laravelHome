<?php

namespace App\Providers;

use App\Library\Services\GenerateXmlFile;
use Illuminate\Support\ServiceProvider;

class GenerateXmlProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\GenerateXmlFile', function($app) {
            return new GenerateXmlFile();
        });
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
