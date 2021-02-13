<?php

namespace Eightfold\Markup\UIKit\Traits;

use Eightfold\Markup\UIKit;

use Eightfold\Markup\UIKit\Elements\Simple\Link;
use Eightfold\Markup\HtmlComponent\Interfaces\Compile;

/**
 * @deprecated
 */
trait PrimaryAndSecondaryNav
{
    private $primaryNav = [];
    private $secondaryNav = [];

    public function primaryNav(Compile ...$links)
    {
        $this->primaryNav = $links;
        return $this;
    }

    public function secondaryNav(Compile ...$links)
    {
        $this->secondaryNav = $links;
        return $this;
    }
}
