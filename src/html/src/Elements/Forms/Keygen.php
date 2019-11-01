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
 * Keygen
 *
 * 
 */
class Keygen extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::keygen()[0]; 
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
    
    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::autofocus(),
            Content::challenge(),
            Content::disabled(),
            Content::form(),
            Content::keytype(),
            Content::name()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }    
}
