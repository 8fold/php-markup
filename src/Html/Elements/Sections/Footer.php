<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Markup\Html\Elements\Sections\Header;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

class Footer extends Header
{
    static public function elementName(): string
    {
        return Elements::footer()[0];
    }

    static public function defaultAriaRole(): string
    {
        return 'contentinfo';
    }
}
