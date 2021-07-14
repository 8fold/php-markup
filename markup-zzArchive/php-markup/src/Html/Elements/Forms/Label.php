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
 * Label
 *
 *
 */
class Label extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::label()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::interactive(),
            Elements::formAssociated(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::phrasing();
    }

    static public function contentModel(): array
    {
        // TODO: Phrasing content, but with no descendant labelable elements unless it
        //       is the element’s labeled control, and no descendant label elements.
        return Elements::phrasing();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::for()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
