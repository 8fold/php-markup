<?php

namespace Eightfold\Markup\Html\Elements\Interactive;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;
use Eightfold\Markup\Html\Data\Attributes\Content;

class Details extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::details()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::sectioning(),
            Elements::interactive(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::flow();
    }

    static public function contentModel(): array
    {
        return array_merge(Elements::summary(), Elements::flow());
    }

    static public function optionalAttributes(): array
    {
        return array_merge(parent::optionalAttributes(), Content::open());
    }

    static public function defaultAriaRole(): string
    {
        return 'group';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::any();
    }
}
