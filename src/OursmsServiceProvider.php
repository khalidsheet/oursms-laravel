<?php


namespace Khalidsheet\Oursms;


use Illuminate\Support\ServiceProvider;

class OursmsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        /**
         * Publishes the config file
         */
        $this->publishes([
            __DIR__ . '/../config/oursms.php' => config_path('oursms.php')
        ]);

    }


    public function register()
    {

    }

}
