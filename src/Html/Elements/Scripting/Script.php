<?php

namespace Eightfold\Markup\Html\Elements\Scripting;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Script
 *
 *
 */
class Script extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::script()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::metadata(),
            Elements::flow(),
            Elements::phrasing(),
            Elements::scriptSupporting()
        );
    }

    static public function contexts(): array
    {
        return array_merge(
            Elements::metadata(),
            Elements::phrasing(),
            Elements::scriptSupporting()
        );
    }

    static public function contentModel(): array
    {
        // TODO: If there is no src attribute, depends on the value of the type
        //       attribute, but must match script content restrictions
        //       (scriptContentDescription). If there is a src attribute, the element
        //       must be either empty or contain only script documentation that also
        //       matches script content restrictions (scriptDocumentation).

        // not part of the HTML5 specification - workaround for transparent content
        // model.
        return Elements::text();
    }

    static public function optionalAttributes(): ESArray
    {
        $extras = array_merge(
            Content::src(),
            Content::type(),
            Content::charset(),
            Content::async(),
            Content::defer(),
            Content::crossorigin()
        );
        return parent::optionalAttributes()->plus(...$extras);
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
