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
 * Optgroup
 *
 *
 */
class Optgroup extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::optgroup()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return Elements::select();
    }

    static public function contentModel(): array
    {
        return array_merge(
            Elements::option(),
            Elements::scriptSupporting()
        );
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::disabled(),
            Content::label()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    public static function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'options', 'element' => 'option', 'multiple' => true]
        ];
    }
}
