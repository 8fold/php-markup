<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\Grouping\Dt;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Dd
 *
 *
 */
class Dd extends Dt
{
    static public function elementName(): string
    {
        return Elements::dd()[0];
    }

    static public function contexts(): array
    {
        // TODO: After dt or dd elements inside dl elements.
        return Elements::dl();
    }
}
