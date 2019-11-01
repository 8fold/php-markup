<?php

namespace Eightfold\Html\Elements\Metadata;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Style
 * 
 */
class Style extends HtmlElement implements HtmlElementInterface
{ 
    static public function elementName(): string 
    { 
        return Elements::style()[0]; 
    }

    static public function categories(): array
    {
        return Elements::metadata();
    }

    static public function contexts(): array
    { 
        return array_merge(Elements::metadata(), Elements::noscript()); 
    }
    
    static public function contentModel(): array 
    { 
        return Elements::text(); 
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::media(),
            Content::type()
        );
    }
}
