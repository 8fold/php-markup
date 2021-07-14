<?php

namespace Eightfold\Markup\Html\Elements\Tabular;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

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
