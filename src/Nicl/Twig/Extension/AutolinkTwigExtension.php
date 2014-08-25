<?php

namespace Nicl\Twig\Extension;

use Nicl\AutolinkInterface;

/**
 * Twig Autolink extension
 */
class AutolinkTwigExtension extends \Twig_Extension
{
    protected $parser;

    /**
     * Public constructor
     *
     * @param AutolinkInterface $parser
     *
     * @return AutolinkTwigExtension
     */
    public function __construct(AutolinkInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            'autolink' => new \Twig_Filter_Method($this, 'autolink',
                array('is_safe' => array('html'))),
        );
    }

    /**
     * Parse string and convert URIs to html link elements
     *
     * @param string $txt
     *
     * @return string
     */
    public function autolink($txt)
    {
        return $this->parser->autolink($txt);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'autolink';
    }
}
