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
 * Object
 *
 *
 */
class Object_ extends Embed
{
    static public function elementName(): string
    {
        return Elements::object()[0];
    }

    static public function categories(): array
    {
        // TODO: Interactive if the element has a usemap
        return array_merge(
            parent::categories(),
            Elements::listed(),
            Elements::submittable(),
            Elements::reassociateable()
        );
    }

    static public function contexts(): array
    {
        return Elements::embedded();
    }

    static protected function contentModel(): array
    {
        // TODO: Transparent
        return array_merge(
            Elements::text(),
            Elements::param()
        );
    }

    static public function requiredAttributes(): array
    {
        return Content::src();
    }

    static public function optionalAttributes(): ESArray
    {
        $extras = array_merge(
                    Content::data(),
                    Content::typemustmatch(),
                    Content::name(),
                    Content::usemap(),
                    Content::form()
                );
        return parent::optionalAriaAttributes()->plus(...$extras)->minus("src");
        // $return = ESArray::fold(array_merge(
        //             parent::optionalAriaAttributes(),
        //             Content::data(),
        //             Content::typemustmatch(),
        //             Content::name(),
        //             Content::usemap(),
        //             Content::form()
        //         ))->minus("src");
        // return $return;
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    public static function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'params', 'element' => 'param', 'multiple' => true]
        ];
    }
}
