Silex-Autolink
==============

A lightweight service provider for Silex which adds an autolink Twig extension.

*This extension is currently in development! The main autolink class is not written yet and the tests are wrong. YOU HAVE BEEN WARNED.*

Installation
------------

Recommended installation is [through composer](http://getcomposer.org). Just add
the following to your `composer.json` file:

    {
        "require": {
            "nicl/silex-autolink": "1.0.*"
        }
    }

Usage
-----

To use the service provider first register it:

    $app->register(new AutolinkServiceProvider());

You can then use the autolink filter in Twig files. For example:

    {{ 'http://example.com'|autolink }}

Tests
-----

If you wish to run the tests you need to have
[PHPUnit](https://github.com/sebastianbergmann/phpunit/) installed. Then, from
the silex-autolink root directory run:

    phpunit

(You may need to adapt the phpunit command and paths depending on your
configuration.)