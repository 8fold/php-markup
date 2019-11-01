<?php

namespace Eightfold\Html\Elements\Grouping;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

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

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::any();
    }
}
