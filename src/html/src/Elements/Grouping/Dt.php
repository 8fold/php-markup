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
 * Dt
 *
 * 
 */
class Dt extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::dt()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        // TODO: Before dd or dt elements inside dl elements.
        return Elements::dl(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: Flow content, but with no header, footer, sectioning content, or 
        //       heading content descendants.
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
