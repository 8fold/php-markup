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
 * Td
 *
 * 
 */
class Td extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::td()[0]; 
    }

    static public function categories(): array
    {
        return [
            Elements::sectioningRoot()
        ];
    }

    static public function contexts(): array
    { 
        return Elements::tr(); 
    }

    static public function contentModel(): array 
    { 
        return Elements::flow(); 
    }

    static public function optionalAttributes(): array
    {
        return [
            parent::optionalAttributes(),
            Content::colspan(),
            Content::rowspan(),
            Content::headers()
        ];
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
