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
 * Option
 *
 *
 */
class Option extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::option()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return array_merge(
            Elements::select(),
            Elements::datalist(),
            Elements::optgroup()
        );
    }

    static public function contentModel(): array
    {
        // TODO: If the element has a label attribute and a value attribute: Nothing.
        //       If the element has a label attribute but no value attribute: Text. If
        //       the element has no label attribute: Text.
        return Elements::text();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::disabled(),
            Content::label(),
            Content::selected(),
            Content::value()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'option';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::menuitem(),
            AriaRoles::menuitemradio(),
            AriaRoles::separator()
        );
    }
}
