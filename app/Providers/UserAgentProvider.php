<?php

namespace App\Providers;

use App\Service\UserAgent\UserAgentInterface;
use App\Service\UserAgent\UserAgentService\UserAgentParserService;
use App\Service\UserAgent\UserAgentService\whichBrowserService;
use Illuminate\Support\ServiceProvider;

class UserAgentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserAgentInterface::class , function (){
//            return new whichBrowserService();
            return new UserAgentParserService();
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
