<?php

namespace Eightfold\Markup\Html\Elements\Embedded;

use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Html\Elements\Embedded\Embed;

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
class Img extends Embed
{
    static public function elementName(): string
    {
        return Elements::img()[0];
    }

    static public function categories(): array
    {
        // TODO: Interactive if the element has a usemap
        return parent::categories();
    }

    static public function requiredAttributes(): array
    {
        return Content::src();
    }

    static public function optionalAttributes(): ESArray
    {
        $extras = array_merge(
            Content::alt(),
            Content::crossorigin(),
            Content::usemap(),
            Content::ismap()
        );
        return ESArray::fold(self::requiredAttributes())
            ->plus(...parent::optionalAttributes())
            ->plus(...parent::optionalAriaAttributes())
            ->plus(...$extras)
            ->minus("type");
        // $return = array_merge(
        //     self::requiredAttributes(),
        //     parent::optionalAttributes(),
        //     parent::optionalAriaAttributes(),
        //     Content::alt(),
        //     Content::crossorigin(),
        //     Content::usemap(),
        //     Content::ismap()
        // );
        // unset($return['type']);
        // return $return;
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): ESArray
    {
        return ESArray::fold(AriaRoles::presentation()) // if `alt` attribute value is empty
            ->plus(...AriaRoles::any());
    }
}
