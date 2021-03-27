<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Service\Geo\GeoServiceInteface;
use App\Service\UserAgent\UserAgentInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QueuVisitController
{
    public function storeUserData(GeoServiceInteface $geo , UserAgentInterface $userAgent , string $ip , string $ua )
    {
        $userAgent->parse($ua);
        $geo->parse($ip);


        $visit['ip'] = $ip;
        $visit['continent_code'] = $geo->continentCode();
        $visit['country_code'] = $geo->countryCode();
        $visit['user_browser'] = $userAgent->getBrowserName();
        $visit['user_os'] = $userAgent->getOsName();

        $visit = Visit::create($visit);

        return new RedirectResponse('/');
    }
}
