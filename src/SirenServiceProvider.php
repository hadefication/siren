<?php

namespace Hadefication\Siren;

use Illuminate\Support\ServiceProvider;

class SirenServiceProvider extends ServiceProvider
{

    /**
     * Register
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('siren', function () {
            return $this->app->make('Hadefication\Siren\Siren');
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
