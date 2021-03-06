<?php

namespace Eightfold\Markup\Html\Elements\TextLevel;

use Eightfold\Markup\Html\Elements\TextLevel\Span;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Data
 *
 *
 */
class Data extends Span
{
    static public function elementName(): string
    {
        return Elements::data()[0];
    }

    static public function requiredAttributes(): array
    {
        return Content::value();
    }
}
