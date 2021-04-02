<?php

namespace Kchinkesh\laravel-model-observer;

use Illuminate\Support\ServiceProvider;

class ModelObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
		$this->app->make('Kchinkesh\laravel-model-observer\src\Http\Controllers\ModelObserverController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
		$this->loadRoutesFrom(__DIR__.'/routes/routes.php');
		$this->loadViewsFrom(__DIR__.'/resources/views', 'laravel-model-observer');
		$this->loadMigrationsFrom(__DIR__.'/Database/migrations');
		$this->publishes([
            __DIR__.'/resources/views' => base_path('resources/views/kchinkesh/laravel-model-observer'),
        ]);
    }
}
