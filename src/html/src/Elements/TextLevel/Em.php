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
class Em extends Span
{
    static public function elementName(): string 
    { 
        return Elements::em()[0]; 
    }
}
