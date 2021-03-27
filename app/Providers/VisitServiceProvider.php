<?php

namespace App\Providers;

use App\Service\Geo\GeoServiceInteface;
use App\Service\Geo\GeoServisec\ipstackService;
use App\Service\Geo\GeoServisec\MaxmindService;
use GeoIp2\Database\Reader;
use Illuminate\Support\ServiceProvider;

class VisitServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GeoServiceInteface::class , function (){
            return new MaxmindService();
//            return new ipstackService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
