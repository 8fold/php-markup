<?php

namespace Eightfold\Html\Elements\Sections;

use Eightfold\Html\Elements\Sections\Header;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

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
