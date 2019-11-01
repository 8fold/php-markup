<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\TextLevel\Span;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Em
 *
 * 
 */
class Strong extends Span
{
    static public function elementName(): string 
    { 
        return Elements::strong()[0]; 
    }
}
