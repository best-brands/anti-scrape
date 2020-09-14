<?php

namespace Tygh\Addons\AntiScrape;

use Tygh\Addons\AntiScrape\WebcrawlerVerifier\WebcrawlerVerifier;
use Tygh\Tygh;


/**
 * Class Service
 *
 * @package Tygh\Addons\AntiScraper
 */
class Service
{
    protected $ip;

    /** @var string the user agent */
    protected $agent;

    /** @var string the pattern to match */
    protected $pattern;

    /**
     * Service constructor.
     */
    public function __construct()
    {
        $uas = fn_get_schema('anti_scrape', 'user_agents');
        $this->pattern = sprintf("/(%s)/", implode('|', $uas));
        $this->agent = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Validate the user agent and splash.
     */
    public function validateUserAgent() {
        if (preg_match($this->pattern, $this->agent) || !$this->agent) {
            db_query("INSERT INTO ?:scrapers ?e ON DUPLICATE KEY UPDATE attempts = attempts + 1", [
                'ip_address' => fn_ip_to_db($_SERVER['REMOTE_ADDR']),
                'user_agent' => $this->agent,
                'timestamp' => time(),
                'attempts' => 1
            ]);
        }

        /** @var WebcrawlerVerifier $verifier */
        $verifier = &Tygh::$app['addons.anti_scrape.webcrawler_verifier'];
        $verification = $verifier->verify($this->agent, $this->ip);

        if ($verification === WebcrawlerVerifier::UNVERIFIED) {
            db_query("INSERT INTO ?:scrapers ?e ON DUPLICATE KEY UPDATE attempts = attempts + 1000", [
                'ip_address' => fn_ip_to_db($_SERVER['REMOTE_ADDR']),
                'user_agent' => $this->agent,
                'timestamp' => time(),
                'attempts' => 1
            ]);
        }

        Tygh::$app['view']->assign('webcrawler_verification_status', $verification);
    }
}
