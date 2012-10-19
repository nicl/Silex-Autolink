<?php

namespace Nicl;

use Nicl\Autolink;

/**
 * Tests for autolink class
 */
class AutolinkTest extends \PHPUnit_Framework_Testcase
{
    /**
     * Test autolink method
     *
     * @param string $txt string (possibly) containing URI
     * @param boolean $expected the expected result
     *
     * @dataProvider testAutolinkProvider
     */
    public function testAutolink($txt, $expected)
    {
        $autolink = new Autolink();
        $result = $autolink->autolink($txt);

        $this->assertEquals($expected, $result);
    }

    /**
     * Provide data for testAutolink
     *
     * Note, there are many strings for which the converter will not work
     * correctly. In particular, URLs which end in parens, e.g.
     *
     *   http://en.wikipedia.org/wiki/PC_Tools_(Central_Point_Software)
     *
     * @return array
     */
    public function testAutolinkProvider()
    {
        return array(
            array('http://example.com', '<a href="http://example.com">http://example.com</a>'),
            array('http://www.example.com', '<a href="http://www.example.com">http://www.example.com</a>'),
            array('www.example.com', '<a href="www.example.com">www.example.com</a>'),
            array('example.com', '<a href="example.com">example.com</a>'),
            array('ftp://public.ftp-servers.example.com/mydirectory/myfile.txt','<a href="ftp://public.ftp-servers.example.com/mydirectory/myfile.txt">ftp://public.ftp-servers.example.com/mydirectory/myfile.txt</a>'),
            array('https://secure.example.com', '<a href="https://secure.example.com">https://secure.example.com</a>'),
            array('room271.net', '<a href="room271.net">room271.net</a>'),
            array('gov.uk/some-useful-information', '<a href="gov.uk/some-useful-information">gov.uk/some-useful-information</a>'),
            array(
                'Robin Hobb is one of the best fantasy writers and this is her website: http://robinhobb.com/.',
                'Robin Hobb is one of the best fantasy writers and this is her website: <a href="http://robinhobb.com/">http://robinhobb.com/</a>.'
                ),
            array(
                'Mark Fowler has written a useful blog on identifying URLs in a string (http://www.codinghorror.com/blog/2008/10/the-problem-with-urls.html).',
                'Mark Fowler has written a useful blog on identifying URLs in a string (<a href="http://www.codinghorror.com/blog/2008/10/the-problem-with-urls.html">http://www.codinghorror.com/blog/2008/10/the-problem-with-urls.html</a>).',
                ),
        );
    }
}