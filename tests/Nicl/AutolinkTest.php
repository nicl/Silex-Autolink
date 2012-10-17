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
     * @param boolean $result the expected result
     *
     * @dataProvider testAutolinkProvider
     */
    public function testAutolink($txt, $result)
    {
        $autolink = new Autolink();
    }

    /**
     * Provide data for testAutolink
     *
     * @return array
     */
    public function testAutolinkProvider()
    {
        return array(
            array('http://example.com', true),
            array('http://www.example.com', true),
            array('www.example.com', true),
            array('example.com', true),
            array('ftp://public.ftp-servers.example.com/mydirectory/myfile.txt', true),
            array('https://secure.example.com', true),
            array('room271.net', true),
            array('gov.uk', true),
            array('Robin Hobb is the best fantasy writter and this is her website: http://robinhobb.com/.', true),
            array('http://room271.net is my blog. You should check it out!', true),
        );
    }
}