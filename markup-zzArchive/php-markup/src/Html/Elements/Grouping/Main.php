<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\Grouping\Div;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Main
 *
 *
 */
class Main extends Div
{
    static public function elementName(): string
    {
        return Elements::main()[0];
    }

    static public function contexts(): array
    {
        // TODO: Where flow content is expected, but with no article, aside, footer,
        //       header or nav element ancestors.
        return parent::contexts();
    }

    static public function defaultAriaRole(): string
    {
        return 'main';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::presentation();
    }
}
