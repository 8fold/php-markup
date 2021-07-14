<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\Grouping\Div;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

/**
 * @version 1.0.0
 *
 * P(aragraph)
 *
 *
 */
class P extends Div
{
    static public function elementName(): string
    {
        return Elements::p()[0];
    }

    static public function contentModel(): array
    {
        return Elements::phrasing();
    }
}
