<?php

namespace Eightfold\Html\Elements\Grouping;

use Eightfold\Html\Elements\Grouping\Div;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

/**
 * @version 1.0.0
 *
 * P(aragraph)
 *
 * 
 */
class P extends Div
{
    static public function elementName(): string 
    { 
        return Elements::p()[0]; 
    }

    static public function contentModel(): array 
    { 
        return Elements::phrasing(); 
    }
}
