<?php

namespace Eightfold\Html\Elements\Tabular;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Colgroup
 *
 * 
 */
class Colgroup extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::colgroup()[0]; 
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    { 
        // TODO: As a child of a table element, after any caption elements and before 
        //       any thead, tbody, tfoot, and tr elements.
        return Elements::table(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: If the span attribute is present: Empty.
        //       If the span attribute is absent: Zero or more col and template 
        //       elements.
        return array_merge(
            Elements::col(),
            Elements::template()
        ); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::span()            
        );
    } 

    static public function defaultAriaRole(): string
    {
        return '';
    }

    public static function configKeysToConvertToElements(): array
    {
        // TODO: Script supporting
        return [
            ['key' => 'columns', 'element' => 'col', 'multiple' => true]
        ];
    }
}
