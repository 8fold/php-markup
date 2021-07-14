<?php

namespace Eightfold\Markup\Html\Elements\TextLevel;

use Eightfold\Markup\Html\Elements\TextLevel\Span;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Time
 *
 *
 */
class Time extends Span
{
    static public function elementName(): string
    {
        return Elements::time()[0];
    }

    static public function optionalAttributes(): array
    {
        return [
            parent::optionalAttributes(),
            Content::datetime() // Link to the source of the quotation or more information about the edit
        ];
    }
}
