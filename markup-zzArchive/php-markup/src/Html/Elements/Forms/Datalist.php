<?php

namespace Eightfold\Markup\Html\Elements\Forms;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html\Elements\HtmlElementInterface;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\AriaRoles;

use Eightfold\Markup\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Datalist
 *
 *
 */
class Datalist extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::datalist()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing()
        );
    }

    static public function contexts(): array
    {
        return array_merge(
            Elements::phrasing(),
            Elements::option(),
            Elements::scriptSupporting()
        );
    }

    static public function contentModel(): array
    {
        return Elements::phrasing();
    }

    static public function defaultAriaRole(): string
    {
        return 'listbox';
    }

    public static function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'options', 'element' => 'option', 'multiple' => true]
        ];
    }
}
