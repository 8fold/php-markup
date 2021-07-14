<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Markup\Html\Elements\Sections\H1;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * H2
 *
 *
 */
class H2 extends H1
{
    static public function elementName(): string
    {
        return Elements::h2()[0];
    }
}
