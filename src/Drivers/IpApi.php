<?php

namespace Stevebauman\Location\Drivers;

use Illuminate\Support\Fluent;
use Stevebauman\Location\Position;

class IpApi extends HttpDriver
{
    /**
     * {@inheritdoc}
     */
    public function url(string $ip): string
    {
        return "http://ip-api.com/json/$ip?fields=status,message,country,countryCode,region,regionName,city,zip,isp,org,as,query";
    }

    /**
     * {@inheritdoc}
     */
    protected function hydrate(Position $position, Fluent $location): Position
    {
        $position->countryName = $location->country;
        $position->countryCode = $location->countryCode;
        $position->regionCode = $location->region;
        $position->regionName = $location->regionName;
        $position->cityName = $location->city;
        $position->zipCode = $location->zip;
        $position->areaCode = $location->region;

        return $position;
    }
}
