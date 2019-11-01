<?php

namespace Eightfold\Html\Elements\Sections;

use Eightfold\Html\Elements\Sections\Article;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

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
