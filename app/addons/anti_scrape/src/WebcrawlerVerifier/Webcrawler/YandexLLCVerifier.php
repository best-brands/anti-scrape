<?php

namespace Tygh\Addons\AntiScrape\WebcrawlerVerifier\Webcrawler;

use Tygh\Addons\AntiScrape\WebcrawlerVerifier\DNS\ReverseVerifier;

class YandexLLCVerifier implements VerifierInterface
{
    protected $allowedHostNames = ['yandex.ru', 'yandex.net', 'yandex.com'];

    /**
     * Checks whether the given IP address really belongs to a valid host or not
     *
     * @param $ip string the IP address to check
     * @return bool true if the given IP belongs to any of the valid hosts, otherwise false
     */
    public function verify($ip)
    {
        return ReverseVerifier::verify($ip, $this->allowedHostNames);
    }
}
