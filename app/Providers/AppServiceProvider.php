<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         ***  we will be able to use @admin in blade files to show content only for the admin user
        */
        Blade::if('admin', function() {
            return auth()->user()?->is_admin;
        });
    }
}
