<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
    public function boot()
    {
        DB::listen(function ($query) {
            // Uncomment the line below to echo the query to the screen
            // echo $query->sql;
            
            // Log the query
            Log::info($query->sql);
            Log::info($query->bindings);
            Log::info($query->time);
        });
    }
    
}
