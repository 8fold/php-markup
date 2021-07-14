<?php

namespace Eightfold\Markup\Html\Elements\Embedded;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Source
 *
 *
 */
class Source extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::source()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        // As a child of an object element, before any flow content.
        return Elements::media();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAriaAttributes(),
            Content::src(),
            Content::type()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
