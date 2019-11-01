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
 * Img
 *
 * 
 */
class Embed extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::embed()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::embedded(),
            Elements::interactive(),
            Elements::palpable()
        );
    }    

    static public function contexts(): array
    { 
        return Elements::embedded(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAriaAttributes(),
            parent::optionalAttributes(),
            Content::src(),
            Content::type(),
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
        return array_merge(
            AriaRoles::application(),
            AriaRoles::document(),
            AriaRoles::img(),
            AriaRoles::presentation()
        );
    }    
}
