<?php

namespace Coolrunner;

use Carbon\Laravel\ServiceProvider;

class CoolrunnerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $configPath = __DIR__.'/config/coolrunner.php';

        if (function_exists('config_path')) {

            $publishPath = config_path('coolrunner.php');

        } else {

            $publishPath = base_path('config/coolrunner.php');

        }

        $this->publishes([$configPath => $publishPath], 'config');
    }
    public function register()
    {
    }
}