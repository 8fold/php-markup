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
 * Tr
 *
 * 
 */
class Tr extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::tr()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    { 
        // TODO: As a child of a thead element. As a child of a tbody element.
        //       As a child of a tfoot element. As a child of a table element, after 
        //       any caption, colgroup, and thead elements, but only if there are no 
        //       tbody elements that are children of the table element.
        return array_merge(
            Elements::thead(),
            Elements::tbody(),
            Elements::tfoot(),
            Elements::table()
        ); 
    }

    static public function contentModel(): array 
    { 
        return array_merge(
            Elements::td(),
            Elements::th(),
            Elements::scriptSupporting()
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
