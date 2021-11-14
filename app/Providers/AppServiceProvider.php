<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Widget;
use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        view()->share('about', About::first());
        view()->share('footer_widgets', Widget::all());
    }
}
