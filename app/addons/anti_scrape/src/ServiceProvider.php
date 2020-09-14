<?php

namespace Tygh\Addons\AntiScrape;

use Tygh\Addons\AntiScrape\WebcrawlerVerifier\WebcrawlerVerifier;

class ServiceProvider implements \Pimple\ServiceProviderInterface
{
    /**
     * @inheritDoc
     */
    public function register(\Pimple\Container $pimple)
    {
        $pimple['addons.anti_scrape.service'] = function () {
            return new Service();
        };

        $pimple['addons.anti_scrape.webcrawler_verifier'] = function () {
            return new WebcrawlerVerifier();
        };

        $pimple['addons.anti_scrape.cache'] = function () {
            return new CacheService();
        };
    }
}
