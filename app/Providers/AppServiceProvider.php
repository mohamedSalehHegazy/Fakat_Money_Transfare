<?php

namespace App\Providers;
use App\Payment\Pay;
use DB;
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
        // $this->app->bind(Pay::class , function ($app){
        //     return new Pay(Auth::user()->id,Auth::user()->balance);
        // });
            
        
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
