<?php

namespace Eightfold\Markup\Html\Elements\Embedded;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Img
 *
 *
 */
class Embed extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::embed()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::embedded(),
            Elements::interactive(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::embedded();
    }

    static public function optionalAttributes(): ESArray
    {
        $extras = array_merge(
                    Content::src(),
                    Content::type(),
                    Content::width(),
                    Content::height()
                );
        return parent::optionalAriaAttributes()
            ->plus(...parent::optionalAttributes())->plus(...$extras);
        // return ESArray::fold(array_merge(
        //             parent::optionalAriaAttributes(),
        //             parent::optionalAttributes(),
        //             Content::src(),
        //             Content::type(),
        //             Content::width(),
        //             Content::height()
        //         ));
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return ESArray::fold(array_merge(
                    AriaRoles::application(),
                    AriaRoles::document(),
                    AriaRoles::img(),
                    AriaRoles::presentation()
                ));
    }
}
