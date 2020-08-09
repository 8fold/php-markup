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
 * Input
 *
 *
 */
class Input extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::input()[0];
    }

    static public function categories(): array
    {
        // TODO: If the type attribute is not in the Hidden state: interactive content.
        //       If the type attribute is not in the Hidden state: listed, labelable,
        //       submittable, resettable, and reassociateable form-associated element.
        //       If the type attribute is in the Hidden state: listed, submittable,
        //       resettable, and reassociateable form-associated element. If the type
        //       attribute is not in the Hidden state: Palpable content.
        return array_merge(
            Elements::flow(),
            Elements::phrasing()
        );
    }

    static public function contexts(): array
    {
        return Elements::phrasing();
    }

    static public function optionalAttributes(): ESArray
    {
        // TODO: Also, the title attribute has special semantics on this element when
        //       used in conjunction with the pattern attribute.
        $extras = array_merge(
                    Content::accept(),
                    Content::alt(),
                    Content::autocomplete(),
                    Content::checked(),
                    Content::dirname(),
                    Content::disabled(),
                    Content::form(),
                    Content::formaction(),
                    Content::formenctype(),
                    Content::formmethod(),
                    Content::formnovalidate(),
                    Content::formtarget(),
                    Content::height(),
                    Content::inputmode(),
                    Content::list(),
                    Content::max(),
                    Content::maxlength(),
                    Content::min(),
                    Content::minlength(),
                    Content::multiple(),
                    Content::name(),
                    Content::pattern(),
                    Content::placeholder(),
                    Content::readonly(),
                    Content::required(),
                    Content::size(),
                    Content::src(),
                    Content::step(),
                    Content::type(),
                    Content::value(),
                    Content::width(),
                    Content::accept()
                );
        return parent::optionalAttributes()->plus(...$extras);
    }

    static public function defaultAriaRole(): string
    {
        // TODO: Depends upon state of the type attribute.
        return '';
    }
}
