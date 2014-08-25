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
        $app['twig'] = $app->extend('twig', function($twig, $app) {
            $twig->addExtension(new AutolinkTwigExtension(new Autolink()));
            return $twig;
        });
    }
}
