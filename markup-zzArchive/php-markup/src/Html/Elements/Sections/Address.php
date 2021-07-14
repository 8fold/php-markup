<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Address
 *
 *
 */
class Address extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::address()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::flow();
    }

    static public function contentModel(): array
    {
        // TODO: But with no heading content, no sectioning content, and no `header`,
        //       `footer`, or `address` element descendants.
        return Elements::flow();
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::contentinfo();
    }
}
