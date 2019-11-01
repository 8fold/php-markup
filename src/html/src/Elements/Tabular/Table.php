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
 * Table
 *
 * 
 */
class Table extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::table()[0]; 
    }

    static public function categories(): array
    {
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
            Elements::caption(),
            Elements::colgroup(),
            Elements::thead(),
            Elements::tbody(),
            Elements::tfoot()
        );
    }

    static public function optionalAttributes(): array
    {
        return [
            parent::optionalAttributes(),
            Content::border(),
            Content::sortable()
        ];
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
            ['key' => 'caption', 'element' => 'caption'],
            ['key' => 'colgroups', 'element' => 'colgroup', 'multiple' => true],
            ['key' => 'head', 'element' => 'thead'],
            ['key' => 'bodies', 'element' => 'tbody', 'multiple' => true],
            ['key' => 'foot', 'element' => 'tfoot']
        ];
    }
}
