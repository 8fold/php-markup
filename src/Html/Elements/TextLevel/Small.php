<?php

namespace Eightfold\Markup\Html\Elements\TextLevel;

use Eightfold\Markup\Html\Elements\TextLevel\Span;

use Eightfold\Markup\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Small
 *
 *
 */
class Small extends Span
{
    static public function elementName(): string
    {
        return Elements::small()[0];
    }
}
