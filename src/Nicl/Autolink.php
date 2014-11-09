<?php

namespace Nicl;

/**
 * Autolink class
 *
 * Identifying URLs within a string is actually quite difficult.
 */
class Autolink implements AutolinkInterface
{
    /**
     * @var string
     *
     * Instantiated in the constructor.
     */
    protected $validURL = null;

    /**
     * Public constructor
     */
    public function __construct()
    {
        $this->validURL = '('
                          . self::PROTOCAL
                          . '|' . self::NO_PROTOCAL
                          . ')'
                          . self::PORT
                          . self::PATH;
    }

    /**
     * Process string and convert all URLs to html links
     *
     * @param string $txt
     *
     * @return string
     */
    public function autolink($txt)
    {
        $pattern = '(' . $this->validURL . ')x';
        $replacement = '<a href="$0">$0</a>';

        return preg_replace($pattern, $replacement, $txt);
    }
}
