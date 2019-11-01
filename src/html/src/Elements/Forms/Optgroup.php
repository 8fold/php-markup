<?php

namespace Eightfold\Html\Elements\Forms;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

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
