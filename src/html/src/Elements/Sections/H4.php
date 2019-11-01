<?php

namespace Eightfold\Html\Elements\Sections;

use Eightfold\Html\Elements\Sections\H1;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * H4
 *
 * 
 */
class H4 extends H1
{
    static public function elementName(): string 
    { 
        return Elements::h4()[0]; 
    }   
}
