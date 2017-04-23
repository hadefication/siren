<?php

namespace Hadefication\Siren;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Hadefication\Siren\Support\SirenBag;

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
        $this->loadViewsFrom(__DIR__.'/resources/views', 'siren');

        View::composer('*', function ($view) {
            $view->with('siren', siren()->messages());
        });
    }
}
