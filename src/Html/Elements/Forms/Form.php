<?php

namespace Eightfold\Markup\Html\Elements\Forms;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Form
 *
 *
 */
class Form extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::form()[0];
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
        return Elements::flow();
    }

    static public function optionalAttributes(): ESArray
    {
        $extras = array_merge(
                    Content::acceptCharset(),
                    Content::action(),
                    Content::autocomplete(),
                    Content::enctype(),
                    Content::method(),
                    Content::name(),
                    Content::novalidate(),
                    Content::target()
                );
        return parent::optionalAttributes()->plus(...$extras);
        // return ESArray::fold(array_merge(
        //             parent::optionalAttributes(),
        //             Content::acceptCharset(),
        //             Content::action(),
        //             Content::autocomplete(),
        //             Content::enctype(),
        //             Content::method(),
        //             Content::name(),
        //             Content::novalidate(),
        //             Content::target()
        //         ));
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return ESArray::fold(AriaRoles::any());
    }
}
