<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('approved', function () {
            return auth()->user()->approved;
        });

        Blade::if('pending', function () {
            return auth()->user()->pending;
        });

        Blade::if('hasnorequest', function () {
            return (! auth()->user()->has_request);
        });

        Blade::if('admin', function () {
            return (bool) auth()->user()->admin;
        });
    }
}
