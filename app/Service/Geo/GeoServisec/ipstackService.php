<?php

namespace App\Service\Geo\GeoServisec;

use App\Service\Geo\GeoServiceInteface;
use Illuminate\Support\Facades\Http;


class ipstackService implements GeoServiceInteface
{
    protected $data;

    public function parse($ip)
    {
        $link = 'http://api.ipstack.com/';
        $access_key = config()->get('services.IPSTACK.access_key');

        $link = $link . $ip . '?access_key=' . $access_key;

        $response = Http::get($link);

        if ($response->ok()){
            $this->data = $response->json();
        }
    }

    public function continentCode()
    {
        return $this->data['continent_code'];
    }

    public function countryCode()
    {
        return $this->data['country_code'];
    }

}
