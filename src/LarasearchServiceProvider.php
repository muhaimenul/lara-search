<?php

namespace Muhaimenul\Larasearch;

use Illuminate\Support\ServiceProvider;

class LarasearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/larasearch.php' => config_path('larasearch.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (file_exists(config_path('larasearch.php'))) {
            $this->mergeConfigFrom(config_path('larasearch.php'), 'larasearch');
        } else {
            $this->mergeConfigFrom(__DIR__ . '/../config/larasearch.php', 'larasearch');
        }
    }
}
