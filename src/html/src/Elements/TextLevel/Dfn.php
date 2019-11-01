<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\TextLevel\Span;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Dfn
 *
 * 
 */
class Dfn extends Span
{
    static public function elementName(): string 
    { 
        return Elements::dfn()[0]; 
    }

    static public function optionalAttributes(): array
    {
        // Also, the title attribute has special semantics on this element.
        return [
            parent::optionalAttributes()
        ];
    }     
}
