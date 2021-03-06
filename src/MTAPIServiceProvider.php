<?php

namespace MapTechnica\MTAPI;

use Illuminate\Support\ServiceProvider;

class MTAPIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'MapTechnicaAPI');

        $this->publishes([
            __DIR__.'/config.php' => config_path('mtapi.php'),
            __DIR__.'/views' => base_path('resources/views/'),
        ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('MapTechnica\MTAPI\MTAPIDataRetriever');
    }
}
