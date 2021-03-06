<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Event;
use App\Appointment;
use App\Observers\EventObserver;
use App\Observers\AppointmentObserver;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
       /*  Log::info("Test"); */
        Event::observe(EventObserver::class);
        Appointment::observe(AppointmentObserver::class);
    }
}
