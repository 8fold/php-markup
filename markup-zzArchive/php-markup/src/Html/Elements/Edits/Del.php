<?php

namespace Eightfold\Markup\Html\Elements\Edits;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\Attributes\AriaRoles;
use Eightfold\Markup\Html\Data\Attributes\Content;
use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Ins(ertion)
 *
 *
 */
class Del extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::del()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::phrasing();
    }

    static public function contentModel(): array
    {
        return Elements::transparent();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::cite(),
            Content::datetime()
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
