<?php

namespace App\Service\Geo\GeoServisec;

use App\Service\Geo\GeoServiceInteface;
use GeoIp2\Database\Reader;

class MaxmindService implements GeoServiceInteface
{
    protected $reader;
    protected $data;

    public function __construct()
    {
        $this->reader = new Reader(
            base_path() . DIRECTORY_SEPARATOR .
            'database' . DIRECTORY_SEPARATOR .
            'geoip' . DIRECTORY_SEPARATOR .
            'Maxmind' . DIRECTORY_SEPARATOR .
            'GeoLite2-City.mmdb');
    }

    public function parse($ip)
    {
        $this->data = $this->reader->city($ip);
    }

    public function continentCode()
    {
        return $this->data->continent->code;
    }

    public function countryCode()
    {
        return $this->data->country->isoCode;
    }
}
