<?php

namespace Eightfold\UIKit\Traits;

/**
 * @deprecated
 */
trait ExternalStylesAndScripts
{
    private $styles = [];
    private $scripts = [];

    public function externalStyles(string ...$styles)
    {
        $this->styles = $styles;
        return $this;
    }

    public function externalScripts(string ...$scripts)
    {
        $this->scripts = $scripts;
        return $this;
    }
}
