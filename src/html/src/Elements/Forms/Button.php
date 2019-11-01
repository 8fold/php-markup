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
 * Button
 *
 * 
 */
class Button extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::button()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(), 
            Elements::interactive(),
            Elements::listed(), 
            Elements::labelable(), 
            Elements::submittable(),
            Elements::reassociateable(),
            Elements::formAssociated(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::phrasing(); 
    }
    
    static public function contentModel(): array 
    { 
        return Elements::phrasing(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::autofocus(),
            Content::disabled(),
            Content::form(),
            Content::formaction(),
            Content::formenctype(),
            Content::formmethod(),
            Content::formnovalidate(),
            Content::formtarget(),
            Content::menu(),
            Content::name(),
            Content::type(),
            Content::value()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'button';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::link(), 
            AriaRoles::menuitem(), 
            AriaRoles::menuitemcheckbox(), 
            AriaRoles::menuitemradio(),
            AriaRoles::radio()
        );
    }    
}
