<?php

namespace Tygh\Addons\AntiScrape\WebcrawlerVerifier;

use Tygh\Tygh;

class WebcrawlerVerifier
{
    const UNKNOWN = -1;

    const UNVERIFIED = 0;

    const VERIFIED = 1;

    protected $webcrawlerVerifiers = [
        'adidxbot' => 'Tygh\Addons\AntiScrape\WebcrawlerVerifier\WebcrawlerVerifier\Webcrawler\MicrosoftCorporationVerifier',
        // Also `AdsBot-Google-Mobile-Apps`
        'AdsBot-Google' => 'GoogleIncVerifier',
        'AdxPsfFetcher-Google' => 'GoogleIncVerifier',
        'Applebot' => 'AppleIncVerifier',
        'AppleNewsBot' => 'InactiveVerifier',
        'Baiduspider' => 'BaiduVerifier',
        'BegunAdvertising' => 'BegunVerifier',
        'bingbot' => 'MicrosoftCorporationVerifier',
        'BingPreview' => 'MicrosoftCorporationVerifier',
        'Chrome-Lighthouse' => 'GoogleIncVerifier',
        'DeuSu' => 'DeusuVerifier',
        'Exabot' => 'DassaultSystemesVerifier',
        'ExaleadCloudview' => 'DassaultSystemesVerifier',
        'FeedValidator/' => 'ValidatorW3OrgVerifier',
        'facebookexternalhit' => 'FacebookIncVerifier',
        'Google favicon' => 'GoogleIncVerifier',
        'Google Keyword Suggestion' => 'GoogleIncVerifier',
        'Google Keyword Tool' => 'GoogleIncVerifier',
        'Google Page Speed Insights' => 'GoogleIncVerifier',
        'Google PP' => 'GoogleIncVerifier',
        'Google Search Console' => 'GoogleIncVerifier',
        'Google Web Preview' => 'GoogleIncVerifier',
        'Google_Analytics_Snippet_Validator' => 'GoogleIncVerifier',
        'Google-Adwords' => 'GoogleIncVerifier',
        // Also `Googlebot-News`, `Googlebot-Image`, `Googlebot-Video`, `Googlebot-Mobile`
        'Googlebot' => 'GoogleIncVerifier',
        'Google-Calendar-Importer' => 'GoogleIncVerifier',
        'Google-Publisher-Plugin' => 'GoogleIncVerifier',
        'Google-SearchByImage' => 'GoogleIncVerifier',
        'Google-Site-Verification' => 'GoogleIncVerifier',
        'Google-Structured-Data-Testing-Tool' => 'GoogleIncVerifier',
        'GoogleWebLight' => 'GoogleIncVerifier',
        'google.com/+/web/snippet/' => 'GoogleIncVerifier',
        'grapeFX' => 'GrapeshotLimitedVerifier',
        'GrapeshotCrawler' => 'GrapeshotLimitedVerifier',
        'istellabot' => 'TiscaliItaliaSpaVerifier',
        'Jigsaw/' => 'ValidatorW3OrgVerifier',
        'librabot/' => 'InactiveVerifier',
        'LinkedInBot' => 'LinkedInIncVerifier',
        'Mail.RU/' => 'MailRuGroupVerifier',
        'Mail.RU_Bot' => 'MailRuGroupVerifier',
        'Mediapartners-Google' => 'GoogleIncVerifier',
        'Mediapartners(Googlebot)' => 'GoogleIncVerifier',
        'MojeekBot' => 'MojeekLtdWebcrawlerVerifier',
        'msnbot' => 'MicrosoftCorporationVerifier',
        'MSRBOT' => 'InactiveVerifier',
        'NING/' => 'ValidatorW3OrgVerifier',
        'oBot/' => 'IBMGermanyResearchAndDevelopmentGmbHVerifier',
        'OdklBot' => 'OdnoklassnikiLLCVerifier',
        'Seznam' => 'SeznamCzASVerifier',
        'SputnikBot' => 'OJSCRostelecomVerifier',
        'SputnikFaviconBot' => 'OJSCRostelecomVerifier',
        'SputnikImageBot' => 'OJSCRostelecomVerifier',
        'Steeler' => 'KitsuregawaLaboratoryTheUniversityOfTokyoVerifier',
        'Twitterbot' => 'TwitterIncVerifier',
        'TurnitinBot' => 'TurnitinLLCVerifier',
        'Validator.nu/' => 'ValidatorW3OrgVerifier',
        'W3C_I18n-Checker/' => 'ValidatorW3OrgVerifier',
        'W3C_Unicorn/' => 'ValidatorW3OrgVerifier',
        'W3C_Validator/' => 'ValidatorW3OrgVerifier',
        'W3C-checklink' => 'ValidatorW3OrgVerifier',
        'W3C-mobileOK/' => 'ValidatorW3OrgVerifier',
        'Wotbox' => 'WotboxTeamVerifier',
        'Y!J-ASR' => 'YahooIncVerifier',
        'Y!J-BRI' => 'YahooIncVerifier',
        'Y!J-BRJ/YATS' => 'YahooIncVerifier',
        'Y!J-BRO/YFSJ' => 'YahooIncVerifier',
        'Y!J-BRW' => 'YahooIncVerifier',
        'Y!J-BSC' => 'YahooIncVerifier',
        'YaDirectFetcher' => 'YandexLLCVerifier',
        'Yahoo! Site Explorer Feed Validator' => 'YahooIncVerifier',
        'Yahoo! Slurp' => 'YahooIncVerifier',
        'YahooCacheSystem' => 'YahooIncVerifier',
        'Yahoo-MMCrawler' => 'YahooIncVerifier',
        'YahooSeeker-Testing' => 'YahooIncVerifier',
        'YahooYSMcm' => 'YahooIncVerifier',
        'Yandex.Translate' => 'YandexLLCVerifier',
        'Yandex/' => 'YandexLLCVerifier',
        'YandexAccessibilityBot' => 'YandexLLCVerifier',
        'YandexAdNet' => 'YandexLLCVerifier',
        'YandexAddURL' => 'YandexLLCVerifier',
        'YandexAntivirus' => 'YandexLLCVerifier',
        'YandexBlogs' => 'YandexLLCVerifier',
        'YandexBot' => 'YandexLLCVerifier',
        'YandexCalendar' => 'YandexLLCVerifier',
        'YandexCatalog' => 'YandexLLCVerifier',
        // Also `YandexDirectDyn`
        'YandexDirect' => 'YandexLLCVerifier',
        'YandexFavicons' => 'YandexLLCVerifier',
        'YandexForDomain' => 'YandexLLCVerifier',
        'YandexVertis' => 'YandexLLCVerifier',
        'YandexImageResizer' => 'YandexLLCVerifier',
        'YandexImages' => 'YandexLLCVerifier',
        'YandexMarket' => 'YandexLLCVerifier',
        // Also `YandexMedianaBot`,
        'YandexMedia' => 'YandexLLCVerifier',
        'YandexMetrika' => 'YandexLLCVerifier',
        'YandexMobileBot' => 'YandexLLCVerifier',
        // Also `YandexNewslinks`
        'YandexNews' => 'YandexLLCVerifier',
        'YandexPagechecker' => 'YandexLLCVerifier',
        'YandexScreenshotBot' => 'YandexLLCVerifier',
        'YandexSomething' => 'YandexLLCVerifier',
        'YandexSearchShop' => 'YandexLLCVerifier',
        'YandexSpravBot' => 'YandexLLCVerifier',
        'YandexSitelinks' => 'YandexLLCVerifier',
        // Also `YandexVideoParser`
        'YandexVideo' => 'YandexLLCVerifier',
        'YandexWebmaster' => 'YandexLLCVerifier',
        'YandexZakladki' => 'YandexLLCVerifier'
    ];

    public function __construct(array $additionalWebcrawlerVerifiers = [])
    {
        $this->webcrawlerVerifiers = array_merge($this->webcrawlerVerifiers, $additionalWebcrawlerVerifiers);
    }

    public function verify($userAgent, $ip)
    {
        if (!is_string($userAgent)) {
            throw new \InvalidArgumentException('The User-agent should be string');
        }

        if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
            throw new \InvalidArgumentException('The IP address is not valid: ' . $ip);
        }

        $verify = self::UNKNOWN;

        if (empty($userAgent)){
            return $verify;
        }

        $cache = &Tygh::$app['addons.anti_scrape.cache'];
        if ($cache->get($ip) === 'A')
            return self::VERIFIED;

        foreach ($this->webcrawlerVerifiers as $pattern => $verifierClass) {
            $verifierClass = 'Tygh\Addons\AntiScrape\WebcrawlerVerifier\Webcrawler\\' . $verifierClass;
            if (stripos($userAgent, $pattern) !== false) {
                $verifier = new $verifierClass();
                $verify = $verifier->verify($ip) ? self::VERIFIED : self::UNVERIFIED;
            }
        }

        if ($verify === self::VERIFIED)
            $cache->set($ip, 'A');

        return $verify;
    }
}
