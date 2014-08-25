<?php

namespace Nicl\Silex;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
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
    public function register(Container $app)
    {
        $app['autolink.parser'] = function () {
            return new Autolink();
        }

        $app['twig'] = $app->extend('twig', function($twig, $app) {
            $twig->addExtension(new AutolinkTwigExtension($app['autolink.parser']));
            return $twig;
        });
    }
}
