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
 * Hr
 *
 *
 */
class Hr extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::hr()[0];
    }

    static public function categories(): array
    {
        return Elements::flow();
    }

    static public function contexts(): array
    {
        return Elements::flow();
    }

    static public function defaultAriaRole(): string
    {
        return 'separator';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return ESArray::fold(AriaRoles::presentation());
    }
}
