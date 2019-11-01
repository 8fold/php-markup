<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\TextLevel\Span;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Sub
 *
 * 
 */
class Sub extends Span
{
    static public function elementName(): string 
    { 
        return Elements::sub()[0]; 
    }
}
