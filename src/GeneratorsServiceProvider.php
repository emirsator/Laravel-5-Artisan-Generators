<?php

namespace EmirSator\Generators;

use Illuminate\Support\ServiceProvider;

class GeneratorsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEntityGenerator();
    }
    /**
     * Register the make:entity generator.
     */
    private function registerEntityGenerator()
    {
        $this->app->singleton('command.emirsator.entity', function ($app) {
            return $app['EmirSator\Generators\Commands\EntityMakeCommand'];
        });
        $this->commands('command.emirsator.entity');
    }
}