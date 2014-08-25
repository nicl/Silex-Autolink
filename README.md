Silex-Autolink
==============

A lightweight service provider for Silex which adds an autolink Twig extension.

Identifying URLs in strings is not easy. This is a rough and pragmatic first
attempt. Feedback is welcome!

Useful information on autolinking can be found in [this article](http://www.codinghorror.com/blog/2008/10/the-problem-with-urls.html) by Martin Fowler (also check out the numerous comments) and also in the book [Mastering Regular Expressions](http://regex.info/) by Jeffrey Friedl.

Installation
------------

Recommended installation is [through composer](http://getcomposer.org). Just add
the following to your `composer.json` file:

    {
        "require": {
            "nicl/silex-autolink": "2.0.*"
        }
    }

Usage
-----

To use the service provider first register it:

    $app->register(new AutolinkServiceProvider());

You can then use the autolink filter in Twig files. For example:

    {{ 'Check out this site: http://example.com'|autolink }}

Tests
-----

If you wish to run the tests you need to have
[PHPUnit](https://github.com/sebastianbergmann/phpunit/) installed. Then, from
the silex-autolink root directory run:

    phpunit

(You may need to adapt the phpunit command and paths depending on your
configuration.)
