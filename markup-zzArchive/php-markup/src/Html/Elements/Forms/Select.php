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
 * Select
 *
 *
 */
class Select extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string
    {
        return Elements::select()[0];
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::interactive(),
            Elements::listed(),
            Elements::labelable(),
            Elements::submittable(),
            Elements::reassociateable(),
            Elements::formAssociated(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    {
        return Elements::phrasing();
    }

    static public function contentModel(): array
    {
        return Elements::phrasing();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::autofocus(),
            Content::disabled(),
            Content::form(),
            Content::multiple(),
            Content::name(),
            Content::required(),
            Content::size()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'listbox';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::menu();
    }

    public static function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'options', 'element' => 'option', 'multiple' => true],
            ['key' => 'option-groups', 'element' => 'optgroup', 'multiple' => true]
        ];
    }
}
