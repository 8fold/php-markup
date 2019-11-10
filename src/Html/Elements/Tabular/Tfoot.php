<?php

namespace Eightfold\Markup\Html\Elements\Tabular;

use Eightfold\Markup\Html\Elements\Tabular\Thead;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Tfoot
 *
 *
 */
class Tfoot extends Thead
{
    static public function elementName(): string
    {
        return Elements::tfoot()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        // TODO: As a child of a table element, after any caption, colgroup, and thead
        //       elements and before any tbody and tr elements, but only if there are
        //       no other tfoot elements that are children of the table element. As a
        //       child of a table element, after any caption, colgroup, thead, tbody,
        //       and tr elements, but only if there are no other tfoot elements that
        //       are children of the table element.
        return Elements::table();
    }
}
