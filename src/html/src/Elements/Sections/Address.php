<?php

namespace Eightfold\Html\Elements\Sections;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Address
 *
 * 
 */
class Address extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::address()[0]; 
    }

    static public function categories(): array
    {
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
        // TODO: But with no heading content, no sectioning content, and no `header`,
        //       `footer`, or `address` element descendants.
        return Elements::flow(); 
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::contentinfo();
    }    
}
