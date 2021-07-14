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
 * Th
 *
 *
 */
class Th extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::th()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return Elements::tr();
    }

    static public function contentModel(): array
    {
        // TODO: Flow content, but with no header, footer, sectioning content, or
        //       heading content descendants.
        return Elements::flow();
    }

    static public function optionalAttributes(): array
    {
        return [
            parent::optionalAttributes(),
            Content::colspan(),
            Content::rowspan(),
            Content::headers(),
            Content::scope(),
            Content::abbr(),
            Content::sorted()
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
