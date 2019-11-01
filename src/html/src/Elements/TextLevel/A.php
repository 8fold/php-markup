<?php

namespace Eightfold\Html\Elements\TextLevel;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;
use Eightfold\Html\Data\AriaRoles;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * A
 *
 * 
 */
class A extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::a()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::flow(),
            Elements::phrasing(),
            Elements::interactive(),
            Elements::palpable()
        );
    }

    static public function contexts(): array
    { 
        return Elements::phrasing(); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: Transparent, but there must be no interactive content descendant.
        return Elements::text(); 
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::href(),
            Content::target(),
            Content::download(),
            Content::rel(),
            Content::hreflang(),
            Content::type()
        );
    }    

    static public function defaultAriaRole(): string
    {
        return 'link';
    }

    static public function optionalAriaRoles(): array
    {
        return [
            Elements::button(),
            Elements::checkbox(),
            Elements::menuitem(),
            Elements::menuitemcheckbox(),
            Elements::menuitemradio(),
            Elements::tab(),
            Elements::treeitem()
        ];
    }    
}
