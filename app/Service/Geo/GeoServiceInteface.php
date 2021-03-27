<?php


namespace App\Service\Geo;

interface GeoServiceInteface
{
    public function continentCode();
    public function countryCode();
    public function parse($ip);

}
