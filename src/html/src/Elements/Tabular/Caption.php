<?php

namespace Eightfold\Html\Elements\Tabular;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Caption
 *
 * 
 */
class Caption extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::caption()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    { 
        return Elements::table(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: But with no descendant table elements.
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
