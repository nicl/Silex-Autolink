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
            // array('gov.uk', true),
            // array('Robin Hobb is the best fantasy writter and this is her website: http://robinhobb.com/.', true),
            // array('http://room271.net is my blog. You should check it out!', true),
        );
    }
}