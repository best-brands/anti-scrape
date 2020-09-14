<?php

namespace Tygh\Addons\AntiScrape;

use Tygh\Core\ApplicationInterface;
use Tygh\Core\BootstrapInterface;
use Tygh\Core\HookHandlerProviderInterface;

/**
 * Class Bootstrap
 *
 * @package Tygh\Addons\Webpack
 */
class Bootstrap implements BootstrapInterface, HookHandlerProviderInterface
{
    const ADDON_NAME = 'anti_scrape';

    /** @var ApplicationInterface */
    protected $app;

    public function boot(ApplicationInterface $app)
    {
        $this->app = &$app;
        $this->app->register(new ServiceProvider());
    }

    /**
     * @inheritDoc
     */
    public function getHookHandlerMap()
    {
        return [
            'before_dispatch' => [
                'addons.anti_scrape.service', 'validateUserAgent'
            ]
        ];
    }
}