<?php

namespace Eightfold\Markup\Html\Elements\TextLevel;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\TextLevel\Span;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;

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

    static public function optionalAttributes(): ESArray
    {
        return parent::optionalAttributes()->plus(...Content::cite());
        // return ESArray::fold(array_merge(
        //             parent::optionalAttributes(),
        //             Content::cite() // Link to the source of the quotation or more information about the edit
        //         ));
    }
}
