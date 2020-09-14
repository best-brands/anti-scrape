<?php

namespace Tygh\Addons\AntiScrape\WebcrawlerVerifier\Webcrawler;

interface VerifierInterface
{
    public function verify($ip);
}
