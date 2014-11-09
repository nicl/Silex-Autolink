<?php

namespace Nicl;

/**
 * Interface for Autolink parsers
 */
interface AutolinkInterface
{
    /**
     * Permissive match if begins with protocal
     */
    const PROTOCAL = '((ftp|https?)://[-\p{L}\p{N}]+(\.[\p{L}\p{N}_][-\p{L}\p{N}_]*)+)';

    /**
     * Match when protocal missing
     *
     * Wikipedia helpfully lists available top-level domains.
     * @link http://en.wikipedia.org/wiki/List_of_Internet_top-level_domains
     */
    const NO_PROTOCAL = '(([\p{L}\p{N}]+ \. )+
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
        ))';

    /**
     * Definition of (optional) port
     */
    const PORT = '(:\d+)?';

    /**
     * Pragmatic definition of path
     *
     * Note, the whitelist for ending characters which excludes several valid
     * characters.
     */
    const PATH = '(((/[\pL\pN-._~:/?#\[\]@!$&\'()*+,;=]*) *)?[\pL\pN_&=#\\/])?';

    /**
     * Process string and convert all URLs to html links
     *
     * @param string $txt
     *
     * @return string
     */
    public function autolink($txt);
}
