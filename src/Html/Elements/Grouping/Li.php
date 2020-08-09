<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Li
 *
 *
 */
class Li extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::li()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return array_merge(
            Elements::ul(),
            Elements::ol()
        );
    }

    static public function contentModel(): array
    {
        return Elements::flow();
    }

    static public function defaultAriaRole(): string
    {
        return 'listiem';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return ESArray::fold(array_merge(
                    AriaRoles::menuitem(),
                    AriaRoles::menuitemcheckbox(),
                    AriaRoles::menuitemradio(),
                    AriaRoles::option(),
                    AriaRoles::tab(),
                    AriaRoles::treeitem(),
                    AriaRoles::presentation()
                ));
    }
}
