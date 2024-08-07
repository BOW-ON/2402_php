<?php

namespace App\Providers;

use App\Utils\MyEncrypt;
use App\Utils\MyToken;
use App\Utils\MyUserValidate;
use App\Utils\MyBoardValidate;
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
        $this->app->bind('MyBoardValidate', function() {
            return new MyBoardValidate();
        });
        $this->app->bind('MyToken', function() {
            return new MyToken();
        });
        $this->app->bind('MyEncrypt', function() {
            return new MyEncrypt();
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
