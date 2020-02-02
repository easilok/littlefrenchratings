<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\View\Factory as ViewFactory;

/**
 *
 * Created by @easilok
 * To be able to access Auth for every views
 * and use it in menu. Needed to register this in
 * config/app.php -> section 'providers'
 *
 * based on: https://laracasts.com/discuss/channels/general-discussion/access-to-authuser-from-appserviceprovider
 */

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', 'App\Http\ViewComposers\GlobalComposer');
    }
}
