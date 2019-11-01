<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\TextLevel\Span;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Bdo
 *
 * 
 */
class Bdo extends Span
{
    static public function elementName(): string 
    { 
        return Elements::bdo()[0]; 
    }

    static public function optionalAttributes(): array
    {
        // Also, the dir global attribute has special semantics on this element.
        return [
            parent::optionalAttributes()
        ];
    }     
}
