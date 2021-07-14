<?php

namespace Eightfold\Markup\Html\Elements\Metadata;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Meta
 *
 */
class Meta extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::meta()[0];
    }

    static public function categories(): array
    {
        return Elements::metadata();
    }

    static public function contexts(): array
    {
        return array_merge(
            // If the charset attribute is present, or if the element's http-equiv
            // attribute is in the encoding declaration state.
            // If the http-equiv attribute is present but not in the encoding
            // declaration state.
            Elements::head(),
            // If the http-equiv attribute is present but not in the encoding
            // declaration
            // state: in a noscript element that is a child of a head element.
            Elements::noscript(),
            // If the name attribute is present: where metadata content is expected.
            Elements::metadata()
        );
    }

    // static public function requiredAttributes(): array
    // {
    //     return Content::href();
    // }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::name(),
            Content::httpequiv(),
            Content::content(),
            Content::charset()
            // Content::href(),
            // Content::crossorigin(),
            // Content::rel(),
            // Content::media(),
            // Content::hreflang(),
            // Content::type(),
            // Content::sizes()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    // static public function omitEndTag(): bool
    // {
    //     return true;
    // }

    static protected function prepare(&$config)
    {
        // Sizes only applies to icon rel;
        // therefore, remove sizes, if set.
        if ( isset($config['rel'])
          && $config['rel'] !== 'icon'
          && isset($config['attributes']['sizes']) ) {
            unset($config['attributes']['sizes']);

        }
    }
}
