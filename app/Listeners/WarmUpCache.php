<?php

namespace App\Listeners;

use App\Events\ClearCache;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Cache;

class WarmUpCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ClearCache  $event
     * @return void
     */
    public function handle(ClearCache $event)
    {
        if (isset($event->cache_keys) && count($event->cache_keys)) {
            foreach ($event->cache_keys as $cache_key) {
                Cache::put($cache_key, '123');
            }
        }
    }
}
