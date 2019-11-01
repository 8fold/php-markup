<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\TextLevel\Span;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Code
 *
 * 
 */
class Code extends Span
{
    static public function elementName(): string 
    { 
        return Elements::code()[0]; 
    }
}
