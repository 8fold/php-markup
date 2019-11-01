<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

/**
 * @version 1.0.0
 *
 * Rtc
 *
 * 
 */
class Rtc extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::rtc()[0]; 
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
        return array_merge(
            Elements::phrasing(),
            Elements::rt()
        ); 
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
