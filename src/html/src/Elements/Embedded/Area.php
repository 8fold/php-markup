<?php

namespace Eightfold\Html\Elements\Embedded;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Area
 *
 * @todo There are a lot of conditions related to areas.
 * 
 */
class Area extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::area()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing()
        );
    }    

    static public function contexts(): array
    { 
        // TODO: Where phrasing content is expected, but only if there is a map 
        //       element ancestor or a template element ancestor.
        return Elements::phrasing(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAriaAttributes(),
            Content::alt(),
            Content::coords(),
            Content::download(),
            Content::href(),
            Content::hreflang(),
            Content::rel(),
            Content::shape(),
            Content::target(),
            Content::type()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'link';
    }   
}
