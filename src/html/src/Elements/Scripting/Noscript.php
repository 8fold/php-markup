<?php

namespace Eightfold\Html\Elements\Scripting;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Noscript
 *
 * 
 */
class Noscript extends HtmlElement implements HtmlElementInterface
{
    static public function elementName(): string 
    { 
        return Elements::noscript()[0]; 
    }

    static public function categories(): array
    {
        return array_merge(
            Elements::metadata(),
            Elements::flow(),
            Elements::phrasing()
        );
    }

    static public function contexts(): array
    { 
        // TODO: In a head element of an HTML document, if there are no ancestor 
        //       noscript elements. Where phrasing content is expected in HTML 
        //       documents, if there are no ancestor noscript elements.
        return array_merge(
            Elements::head(),
            Elements::phrasing()
        ); 
    }
    
    static public function contentModel(): array 
    { 
        // TODO: When scripting is disabled, in a head element: in any order, zero or 
        //       more link elements, zero or more style elements, and zero or more 
        //       meta elements. When scripting is disabled, not in a head element: 
        //       transparent, but there must be no noscript element descendants. 
        //       Otherwise: text that conforms to the requirements given in the prose.
        return Elements::text(); 
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
}
