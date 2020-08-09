<?php

namespace Eightfold\Markup\Html\Elements\Metadata;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Link
 *
 */
class Link extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::Link()[0];
    }

    static public function categories(): array
    {
        return Content::metadata();
    }

    static public function contexts(): array
    {
        return Elements::metadata();
    }

    static public function requiredAttributes(): array
    {
        return Content::href();
    }

    static public function optionalAttributes(): ESArray
    {
        $extras = array_merge(
                    Content::href(),
                    Content::crossorigin(),
                    Content::rel(),
                    Content::media(),
                    Content::hreflang(),
                    Content::type(),
                    Content::sizes()
                );
        return parent::optionalAttributes()->plus(...$extras);
        // return ESArray::fold(array_merge(
        //             parent::optionalAttributes(),
        //             Content::href(),
        //             Content::crossorigin(),
        //             Content::rel(),
        //             Content::media(),
        //             Content::hreflang(),
        //             Content::type(),
        //             Content::sizes()
        //         ));
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

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
