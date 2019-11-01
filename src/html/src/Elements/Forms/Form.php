<?php

namespace Eightfold\Html\Elements\Forms;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Form
 *
 * 
 */
class Form extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::form()[0]; 
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
        return Elements::flow(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::acceptCharset(),
            Content::action(),
            Content::autocomplete(),
            Content::enctype(),
            Content::method(),
            Content::name(),
            Content::novalidate(),
            Content::target()
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
