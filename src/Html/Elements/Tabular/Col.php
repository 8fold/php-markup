<?php

namespace Eightfold\Markup\Html\Elements\Tabular;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Col
 *
 *
 */
class Col extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::col()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        // TODO: As a child of a colgroup element that doesn't have a span attribute.
        return Elements::colgroup();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::span()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
