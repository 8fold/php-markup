<?php

namespace Eightfold\Markup\Html\Elements\Tabular;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Thead
 *
 *
 */
class Thead extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::thead()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        // TODO: As a child of a table element, after any caption, and colgroup
        //       elements and before any tbody, tfoot, and tr elements, but only if
        //       there are no other thead elements that are children of the table
        //       element.
        return Elements::table();
    }

    static public function contentModel(): array
    {
        return array_merge(
            Elements::tr(),
            Elements::scriptSupporting()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::any();
    }

    public static function configKeysToConvertToElements(): array
    {
        // TODO: Script supporting
        return [
            ['key' => 'rows', 'element' => 'tr', 'multiple' => true]
        ];
    }
}
