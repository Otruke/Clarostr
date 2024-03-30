<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Exceptions\CustomExceptionHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Here is to display an error page and contact support in the App\Exception\customexcaptionHandler directory
        //instead of showing the php error code.
        // $this->app->singleton(
        //     \Illuminate\Contracts\Debug\ExceptionHandler::class,
        //     CustomExceptionHandler::class
        // );
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
