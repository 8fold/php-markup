<?php

namespace Eightfold\Html\Elements\Sections;

use Eightfold\Html\Elements\Sections\H1;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * H2
 *
 * 
 */
class H2 extends H1
{
    static public function elementName(): string 
    { 
        return Elements::h2()[0]; 
    }   
}
