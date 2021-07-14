<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Figcaption
 *
 *
 */
class Figcaption extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::figcaption()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        // first or last child
        return Elements::figure();
    }

    static public function contentModel(): array
    {
        return Elements::flow();
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
