<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\Grouping\Ul;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Ol
 *
 *
 */
class Ol extends Ul
{
    static public function elementName(): string
    {
        return Elements::ol()[0];
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::reversed(),
            Content::start(),
            Content::type()
        );
    }
}
