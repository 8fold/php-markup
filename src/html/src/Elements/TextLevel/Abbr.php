<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\TextLevel\Span;

use Eightfold\Html\Data\Elements;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Abbr
 *
 * 
 */
class Abbr extends Span
{
    static public function elementName(): string 
    { 
        return Elements::abbr()[0]; 
    }

    static public function optionalAttributes(): array
    {
        return [
            parent::optionalAttributes(),
            Content::cite() // Link to the source of the quotation or more information about the edit
        ];
    }     
}
