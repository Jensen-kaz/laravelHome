<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\Grid\ColumnMakers\Articles;

class ColumnMakerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Grid\ColumnMakerAbstract', function($app) {
            return new Articles();
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
