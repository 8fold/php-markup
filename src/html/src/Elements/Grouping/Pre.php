<?php

namespace Eightfold\Html\Elements\Grouping;

use Eightfold\Html\Elements\Grouping\P;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Pre
 *
 * 
 */
class Pre extends P
{
    static public function elementName(): string 
    { 
        return Elements::pre()[0]; 
    }
}
