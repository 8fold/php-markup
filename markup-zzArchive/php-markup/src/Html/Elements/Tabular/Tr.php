<?php

namespace Eightfold\Markup\Html\Elements\Tabular;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

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
