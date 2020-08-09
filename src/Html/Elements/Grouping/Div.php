<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

class Div extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::div()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::flow();
    }

    static public function contentModel(): array
    {
        return Elements::flow();
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return ESArray::fold(AriaRoles::any());
    }
}
