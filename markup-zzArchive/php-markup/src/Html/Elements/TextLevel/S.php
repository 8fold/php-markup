<?php

namespace Eightfold\Markup\Html\Elements\TextLevel;

use Eightfold\Markup\Html\Elements\TextLevel\Span;

use Eightfold\Markup\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * S
 *
 *
 */
class S extends Span
{
    static public function elementName(): string
    {
        return Elements::s()[0];
    }
}
