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
 * Map
 *
 *
 */
class Map extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::map()[0];
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

    static protected function contentModel(): array
    {
        // TODO: Transparent
        return Elements::text();
    }

    static public function requiredAttributes(): array
    {
        return Content::name();
    }

    static public function optionalAttributes(): array
    {
        return parent::optionalAriaAttributes();
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
