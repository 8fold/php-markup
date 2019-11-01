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
 * Fieldset
 *
 * 
 */
class Fieldset extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::fieldset()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::sectioningRoot(), 
            Elements::listed(), 
            Elements::reassociateable(),
            Elements::formAssociated(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::flow(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: Optionally a legend element, followed by flow content.
        return array_merge(
            Elements::legend(),
            Elements::flow()
        ); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::disabled(),
            Content::form(),
            Content::name()
        );
    }

    static public function defaultAriaRole(): string
    {
        return 'group';
    }

    static public function optionalAriaRoles(): array
    {
        return AriaRoles::presentation();
    }

    public static function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'legend', 'element' => 'legend']
        ];
    }
}

