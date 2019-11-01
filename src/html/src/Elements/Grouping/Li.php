<?php

namespace Eightfold\Html\Elements\Grouping;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Li
 *
 * 
 */
class Li extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::li()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }    

    static public function contexts(): array
    { 
        return array_merge(
            Elements::ul(),
            Elements::ol()
        ); 
    }
    
    static public function contentModel(): array 
    { 
        return Elements::flow(); 
    }

    static public function defaultAriaRole(): string
    {
        return 'listiem';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::menuitem(),
            AriaRoles::menuitemcheckbox(),
            AriaRoles::menuitemradio(),
            AriaRoles::option(),
            AriaRoles::tab(),
            AriaRoles::treeitem(),
            AriaRoles::presentation()
        );
    }    
}
