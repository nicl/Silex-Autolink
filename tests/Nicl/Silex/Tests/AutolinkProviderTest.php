<?php

namespace Nicl\Silex\Tests;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Twig_Loader_String;
use Nicl\Silex\AutolinkServiceProvider;

/**
 * Tests for autolink service provider
 */
class AutolinkServiceProviderTest extends \PHPUnit_Framework_Testcase
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->app = new Application();
        $this->app->register(new TwigServiceProvider());
        $this->app->register(new AutolinkServiceProvider());
    }

    /**
     * Basic test case of service provider
     */
    public function testMarkdownTwigFilter()
    {
        $twig = $this->app['twig'];
        $twig->setLoader(new Twig_Loader_String());
        $output = $twig->loadTemplate("{{ 'http://example.com' | autolink }}")->render(array());

        $this->assertEquals("<a href=\"http://example.com\">http://example.com</a>", $output);
    }
}