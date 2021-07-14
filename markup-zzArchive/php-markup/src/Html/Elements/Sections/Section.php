<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Markup\Html\Elements\Sections\Article;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Section
 *
 *
 */
class Section extends Article
{
    static public function elementName(): string
    {
        return Elements::section()[0];
    }

    static public function defaultAriaRole(): string
    {
        return 'region';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::alert(),
            AriaRoles::alterdialog(),
            AriaRoles::contentinfo(),
            AriaRoles::dialog(),
            AriaRoles::document(),
            AriaRoles::log(),
            AriaRoles::main(),
            AriaRoles::marquee(),
            AriaRoles::presentation(),
            AriaRoles::search(),
            AriaRoles::status()
        );
    }
}
