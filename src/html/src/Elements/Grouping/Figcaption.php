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
 * Figcaption
 *
 * 
 */
class Figcaption extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::figcaption()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    { 
        // first or last child
        return Elements::figure(); 
    }
    
    static public function contentModel(): array 
    { 
        return Elements::flow(); 
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::any();
    }    
}
