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
 * Param
 *
 * 
 */
class Param extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::param()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }    

    static public function contexts(): array
    { 
        // As a child of an object element, before any flow content.
        return Elements::object(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAriaAttributes(),
            Content::name(),
            Content::value()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
