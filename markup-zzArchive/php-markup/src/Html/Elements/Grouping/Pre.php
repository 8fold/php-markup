<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\Grouping\P;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Pre
 *
 *
 */
class Pre extends P
{
    static public function elementName(): string
    {
        return Elements::pre()[0];
    }
}
