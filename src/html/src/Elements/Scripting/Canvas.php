<?php

namespace Eightfold\Html\Elements\Scripting;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Attributes\Aria;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

/**
 * @version 1.0.0
 *
 * Script
 *
 * 
 */
class Canvas extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::canvas()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::embedded(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::embedded(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: Transparent content model. Restricted by parent.
        return Elements::text(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::width(),
            Content::height()
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

    static public function optionalAriaAttributes(): array
    {
        return array_merge(
            parent::optionalAriaAttributes(),
            Aria::width(),
            Aria::height()
        );
    }
}
