<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

/**
 * @version 1.0.0
 *
 * Rp
 *
 * 
 */
class Rp extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::rp()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    { 
        // TODO: As a child of a ruby element, either immediately before or 
        //       immediately after an rt or rtc element, but not between rt elements.
        return Elements::ruby(); 
    }
    
    static public function contentModel(): array 
    { 
        return Elements::phrasing(); 
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
