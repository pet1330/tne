<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('app_version',
            \Cache::remember('app_version', 10, function () {
                return strtok(shell_exec('git describe --always --tags'), '-');
            })
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
