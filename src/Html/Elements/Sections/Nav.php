<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Markup\Html\Elements\Sections\Aside;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Nav
 *
 *
 */
class Nav extends Aside
{
    static public function elementName(): string
    {
        return Elements::nav()[0];
    }

    static public function defaultAriaRole(): string
    {
        return 'navigation';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::presentation();
    }
}
