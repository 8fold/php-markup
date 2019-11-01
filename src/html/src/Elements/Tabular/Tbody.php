<?php

namespace Eightfold\Html\Elements\Tabular;

use Eightfold\Html\Elements\Tabular\Thead;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Tbody
 *
 * 
 */
class Tbody extends Thead
{
    static public function elementName(): string 
    { 
        return Elements::tbody()[0]; 
    }

    static public function contexts(): array
    { 
        // TODO: As a child of a table element, after any caption, and colgroup 
        //       elements and before any tbody, tfoot, and tr elements, but only if 
        //       there are no other thead elements that are children of the table 
        //       element.
        return Elements::table(); 
    }
}
