<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */

    protected $subscribe = [
        'App\Listeners\ExampleEventSubscriber',
    ];

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\OrderShipped' => [
            'App\Listeners\SendShipmentNotification',
        ],
//        'Illuminate\Auth\Events\Login' => [
//            'App\Listeners\SendEmailNotification',
//        ],
//        'App\Events\ClearCache' => [
//            'App\Listeners\WarmUpCache',
//        ],
        'App\Events\SendEmail' => [
            'App\Listeners\SendEmailAdmin',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
