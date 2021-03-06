<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\User;
use App\Portfolio;
use App\Stock;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
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

        User::created(function($user) {
          $portfolio = new Portfolio();
          $user->portfolio()->save($portfolio);
          $user->createSlug();
        });

        Stock::created(function($stock) {
          $stock->createSlug();
        });
    }
}
