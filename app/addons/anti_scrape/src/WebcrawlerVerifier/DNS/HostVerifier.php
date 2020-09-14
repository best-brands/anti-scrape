<?php
namespace Tygh\Addons\AntiScrape\WebcrawlerVerifier\DNS;

use Tygh\Addons\AntiScrape\WebcrawlerVerifier\Helper\StringHelper as StringHelper;

class HostVerifier
{
    public static function verify($host, array $allowedHostNames)
    {
        return !!array_filter($allowedHostNames, function ($validHost) use ($host) {
            return StringHelper::endsWith($validHost, $host) !== false;
        });
    }
}
