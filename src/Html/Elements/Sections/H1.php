<?php

namespace Eightfold\Markup\Html\Elements\Sections;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * H1
 *
 *
 */
class H1 extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::h1()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::heading(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::flow();
    }

    static public function contentModel(): array
    {
        return Elements::phrasing();
    }

    static public function defaultAriaRole(): string
    {
        return 'heading';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return AriaRoles::tab()->plus(...AriaRoles::presentation());
        // return array_merge(
        //     AriaRoles::tab(),
        //     AriaRoles::presentation()
        // );
    }
}
