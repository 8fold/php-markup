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
 * Legend
 *
 *
 */
class Legend extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::legend()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return Elements::fieldset();
    }

    static public function contentModel(): array
    {
        return Elements::phrasing();
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
