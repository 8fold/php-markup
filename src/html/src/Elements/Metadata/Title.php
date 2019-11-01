<?php

namespace Eightfold\Html\Elements\Metadata;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Title
 *
 * Hold the title for the document.
 * 
 */
class Title extends HtmlElement implements HtmlElementInterface
{ 
    static public function elementName(): string 
    { 
        return Elements::title()[0]; 
    }

    static public function categories(): array
    {
        return Elements::metadata();
    }

    static public function contexts(): array
    { 
        return Elements::head(); 
    }
    
    static public function contentModel(): array 
    { 
        return Elements::text(); 
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }  
}
