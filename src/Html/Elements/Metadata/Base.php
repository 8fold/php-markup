<?php

namespace Eightfold\Markup\Html\Elements\Metadata;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Base
 *
 */
class Base extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::base()[0];
    }

    static public function categories(): array
    {
        return Elements::metadata();
    }

    static public function contexts(): array
    {
        return Elements::head();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::href(),
            Content::target()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
