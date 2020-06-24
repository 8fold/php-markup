<?php

namespace Eightfold\Markup\Html\Elements\Interactive;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

class Div extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::summary()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return Elements::details();
    }

    static public function contentModel(): array
    {
        // TODO: Or one element of heading content
        return Elements::phrasing();
    }

    static public function defaultAriaRole(): string
    {
        return 'button';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::any();
    }
}
