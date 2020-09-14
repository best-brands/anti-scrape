<?php

namespace Tygh\Addons\AntiScrape;

use Tygh\Registry;

/**
 * Class DNSCache
 * @package Tygh\Addons\AntiScrape
 */
class CacheService
{
    private $hashSalt = "ads98f3";
    private $cacheKey = 'anti_scrape_dns';

    /**
     * DNSCache constructor.
     */
    public function __construct() {
        Registry::registerCache(
            $this->cacheKey,
            ['ttl' => SECONDS_IN_DAY * 3],
            Registry::cacheLevel('static'),
            true
        );
    }

    /**
     * Set something in our cache
     *
     * @param $dns
     * @param $data
     *
     * @return bool
     */
    public function set($dns, $data) {
        return Registry::set($this->getKey($dns), $data);
    }

    /**
     * Get something from our cache
     *
     * @param $dns
     *
     * @return mixed
     */
    public function get($dns) {
        return Registry::get($this->getKey($dns));
    }

    /**
     * Formats the key of our cache
     *
     * @param $key
     *
     * @return string
     */
    private function getKey($key) {
        return sprintf("%s.%s", $this->cacheKey, md5($this->hashSalt . $key . $this->hashSalt));
    }
}