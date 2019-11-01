<?php

namespace Eightfold\UIKit\Traits;

use Eightfold\UIKit\UIKit;

use Eightfold\UIKit\Elements\Simple\Link;
use Eightfold\HtmlComponent\Interfaces\Compile;

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
