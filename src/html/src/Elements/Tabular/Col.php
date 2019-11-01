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
 * Col
 *
 * 
 */
class Col extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::col()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    { 
        // TODO: As a child of a colgroup element that doesn't have a span attribute.
        return Elements::colgroup(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::span()            
        );
    } 

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
