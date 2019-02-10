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
            __DIR__.'/Config/larasearch.php' => config_path('larasearch.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/larasearch.php', 'larasearch'
        );
        config([
            'config/larasearch.php',
        ]);
    }
}
