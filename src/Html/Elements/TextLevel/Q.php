<?php

namespace Eightfold\Markup\Html\Elements\TextLevel;

use Eightfold\Markup\Html\Elements\TextLevel\Span;

use Eightfold\Markup\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Q
 *
 *
 */
class Q extends Span
{
    static public function elementName(): string
    {
        return Elements::q()[0];
    }

    static public function optionalAttributes(): array
    {
        return [
            parent::optionalAttributes(),
            Content::cite() // Link to the source of the quotation or more information about the edit
        ];
    }
}
