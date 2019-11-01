<?php

namespace Eightfold\Html\Elements\Sections;

use Eightfold\Html\Elements\Sections\Article;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Aside
 *
 * 
 */
class Aside extends Article
{
    static public function elementName(): string 
    { 
        return Elements::aside()[0]; 
    }

    static public function contentModel(): array 
    { 
        // TODO: But with no `main` descendants.
        return Elements::flow(); 
    }    

    static public function defaultAriaRole(): string
    {
        return 'complementary';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::note(),
            AriaRoles::search(),
            AriaRoles::presentation()
        );
    }    
}
