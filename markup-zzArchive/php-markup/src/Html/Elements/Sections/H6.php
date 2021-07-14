<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Markup\Html\Elements\Sections\H1;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * H4
 *
 *
 */
class H6 extends H1
{
    static public function elementName(): string
    {
        return Elements::h6()[0];
    }
}
