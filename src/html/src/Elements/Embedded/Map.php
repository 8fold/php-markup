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
 * Map
 *
 * 
 */
class Map extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::map()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::phrasing(); 
    }

    static protected function contentModel(): array
    {
        // TODO: Transparent
        return Elements::text();
    }

    static public function requiredAttributes(): array
    {
        return Content::name();
    }

    static public function optionalAttributes(): array
    {
        return parent::optionalAriaAttributes();
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }    
}
