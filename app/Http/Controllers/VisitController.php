<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visit;
use App\Service\Geo\GeoServiceInteface;
use App\Service\UserAgent\UserAgentInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class VisitController
{
    public function getData(GeoServiceInteface $geo , UserAgentInterface $userAgent , Request $request)
    {
        $userAgent->parse($request->userAgent());

        $ip = $request->server('HTTP_X_FORWARDED_FOR') ?? $request->ip();

        try {
            $geo->parse($ip);
        } catch (\GeoIp2\Exception\AddressNotFoundException $e) {
            $request->session()->put([
                'message' => $e->getMessage(),
            ]);
            return new RedirectResponse('/');
        }

        $visit['ip'] = $ip;
        $visit['continent_code'] = $geo->continentCode();
        $visit['country_code'] = $geo->countryCode();
        $visit['user_browser'] = $userAgent->getBrowserName();
        $visit['user_os'] = $userAgent->getOsName();


        if (null === (Visit::where('ip', $ip)->first())) {
            $visit = Visit::create($visit);
            $request->session()->put([
                'message' => 'Your ip was saved.',
            ]);
            return new RedirectResponse('/');
        }

        $request->session()->put([
            'message' => 'Your ip already saved.',
        ]);

        return new RedirectResponse('/');
    }

}
