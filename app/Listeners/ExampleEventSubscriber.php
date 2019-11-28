<?php

namespace App\Listeners;
class ExampleEventSubscriber
{
/**
* Handle user login events.
*/
public function sendEmailNotification($event) {

$email = $event->user->email;
$username = $event->user->name;

}
/**
* Handle user logout events.
*/
public function warmUpCache($event) {
    if (isset($event->cache_keys) && count($event->cache_keys)) {
        foreach ($event->cache_keys as $cache_key) {

        }
    }
}
/**
* Register the listeners for the subscriber.
*
* @param  Illuminate\Events\Dispatcher  $events
*/
public function subscribe($events) {
    $events->listen(
    'Illuminate\Auth\Events\Login',
    'App\Listeners\ExampleEventSubscriber@sendEmailNotification'
    );

    $events->listen(
    'App\Events\ClearCache',
    'App\Listeners\ExampleEventSubscriber@warmUpCache'
    );
}
}
