<?php

namespace Eightfold\Html\Elements\Grouping;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\EventOn;

/**
 * @version 1.0.0
 *
 * Ul
 *
 * 
 */
class Ul extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::ul()[0]; 
    }

    static public function categories(): array
    {
        // TODO: If the element's children include at least one li element: Palpable 
        //       content.
        return array_merge(
            Elements::flow(), 
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::flow(); 
    }
    
    static public function contentModel(): array 
    { 
        return array_merge(
            Elements::li(),
            Elements::scriptSupporting()
        ); 
    }

    static public function defaultAriaRole(): string
    {
        return 'list';
    }

    static public function optionalAriaRoles(): array
    {
        return array_merge(
            AriaRoles::directory(),
            AriaRoles::group(),
            AriaRoles::listbox(),
            AriaRoles::menu(),
            AriaRoles::menubar(),
            AriaRoles::presentation(),
            AriaRoles::tablist(),
            AriaRoles::toolbar(),
            AriaRoles::tree()
        );
    }

    public static function configKeysToConvertToElements(): array
    { 
        return [
            ['key' => 'items', 'element' => 'li', 'multiple' => true]
        ];
    }  
}
