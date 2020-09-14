<?php

namespace Tygh\Addons\AntiScrape\WebcrawlerVerifier\Webcrawler;

use Tygh\Addons\AntiScrape\WebcrawlerVerifier\Helper\Range;

class ValidatorW3OrgVerifier implements VerifierInterface
{
    protected $allowedRanges = ['128.30.52.0/24'];

    /**
     * Checks whether the given IP address really belongs to a valid host or not
     *
     * @param $ip string the IP address to check
     * @return bool true if the given IP belongs to any of the valid hosts, otherwise false
     */
    public function verify($ip)
    {
        return Range::inRange($ip, $this->allowedRanges);
    }
}
