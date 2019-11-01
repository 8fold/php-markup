<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

/**
 * @version 1.0.0
 *
 * Rb
 *
 * 
 */
class Rb extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::rb()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    { 
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
