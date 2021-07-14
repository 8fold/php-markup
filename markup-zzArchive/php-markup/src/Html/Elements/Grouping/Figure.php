<?php

namespace Eightfold\Markup\Html\Elements\Grouping;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Figure
 *
 *
 */
class Figure extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::figure()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::sectioningRoot(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::flow();
    }

    static public function contentModel(): array
    {
        // TODO: Either: One figcaption element followed by flow content.
        //       Or: Flow content followed by one figcaption element.
        //       Or: Flow content.
        return array_merge(
            Elements::figcaption(),
            Elements::flow()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
