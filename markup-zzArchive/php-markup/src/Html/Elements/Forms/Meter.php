<?php

namespace Eightfold\Markup\Html\Elements\Forms;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Meter
 *
 *
 */
class Meter extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::meter()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::labelable(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::phrasing();
    }

    static public function contentModel(): array
    {
        // TODO: Phrasing content, but there must be no meter element descendants.
        return Elements::phrasing();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::value(),
            Content::min(),
            Content::max(),
            Content::low(),
            Content::high(),
            Content::optimum()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
