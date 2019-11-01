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
 * Hr
 *
 * 
 */
class Hr extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::hr()[0]; 
    }

    static public function categories(): array
    {
        return Elements::flow();
    }

    static public function contexts(): array
    { 
        return Elements::flow(); 
    }
    
    static public function defaultAriaRole(): string
    {
        return 'separator';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::presentation();
    }    
}
