<?php

namespace Tygh\Addons\AntiScrape\WebcrawlerVerifier\DNS;

class ReverseVerifier
{
    private static function getHostByAddr($ip) {
        return gethostbyaddr($ip);
    }

    private static function getHostByName($dns) {
        return gethostbyname($dns);
    }

    public static function verify($ip, array $allowedHostNames)
    {
        $host = self::getHostByAddr($ip);
        $ipAfterLookup = self::getHostByName($host);
        return HostVerifier::verify($host, $allowedHostNames) && $ipAfterLookup === $ip;
    }
}
