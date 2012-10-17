<?php

namespace Nicl\Silex;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Nicl\Autolink;
use Nicl\Twig\Extension\AutolinkTwigExtension;

/**
 * Simple autolink service provider
 */
class AutolinkServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        $app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
            $twig->addExtension(new AutolinkTwigExtension(new Autolink()));
            return $twig;
        }));
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}