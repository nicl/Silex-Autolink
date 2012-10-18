<?php

namespace Nicl;

/**
 * Autolink class
 *
 * Identifying URIs within a string is actually quite difficult.
 */
class Autolink
{
    /**
     * Permissive match if begins with protocal
     */
    const PROTOCAL = '(ftp|https?)://[-\pL]+(\.\pL[-\pL]*)+';

    /**
     * Match when protocal missing
     *
     * Wikipedia helpfully lists available top-level domains.
     * @link http://en.wikipedia.org/wiki/List_of_Internet_top-level_domains
     */
    const NO_PROTOCAL = '([\pL] ([-\pL]*)? \. )+
        ( aero\b
        | asia\b
        | biz\b
        | cat\b
        | com\b
        | coop\b
        | edu\b
        | gov\b
        | info\b
        | int\b
        | jobs\b
        | mil\b
        | mobi\b
        | museum\b
        | name\b
        | net\b
        | org\b
        | pro\b
        | tel\b
        | travel\b
        | xxx\b
        | [a-z][a-z]\b
        )';

    /**
     * Permissive definition of path
     */
    const PATH = '((/[\pL]*)*)?';

    const PORT = '(:\d+)?';

    /**
     * Valid end characters for a URI
     *
     * A notable omission here are parens (to avoid complications).
     */
    const END = '[a-z0-9_&=#\\/]';

    /**
     * @var string
     *
     * Instantiated in the constructor.
     */
    protected $validURL = null;

    public function __construct()
    {
        $this->validURL = '('
                          . self::PROTOCAL
                          . '|' . self::NO_PROTOCAL
                          . ')'
                          . PORT
                          . PATH
                          . END;
    }

    /**
     * Process string and convert all URIs to html links
     *
     * @param string $txt
     *
     * @return string
     */
    public function autolink($txt)
    {
        $pattern = '#' . $this->validURL . '#';
        preg_match($pattern, $txt, $matches);
        var_dump($matches); exit();

        //return preg_replace($pattern, $replacement, $txt);
    }
}