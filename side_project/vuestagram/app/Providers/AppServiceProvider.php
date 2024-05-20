<?php

namespace App\Providers;

use App\Utils\MyUserValidate;
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
        // facade 작업
        $this->app->bind('MyUserValidate', function() {
            return new MyUserValidate();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
