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
 * Dl
 *
 * 
 */
class Dl extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::dl()[0]; 
    }

    static public function categories(): array
    {
        // TODO: If the element's children include at least one name-value group: 
        //       Palpable content.
        return array_merge(
            Elements::flow(), 
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::flow(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: Zero or more groups each consisting of one or more dt elements 
        //       followed by one or more dd elements, optionally intermixed with 
        //       script-supporting elements.
        return array_merge(
            Elements::dt(),
            Elements::dd(),
            Elements::scriptSupporting()
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
