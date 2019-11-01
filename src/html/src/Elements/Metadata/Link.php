<?php

namespace Eightfold\Html\Elements\Metadata;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;

use Eightfold\Html\Data\Attributes\Content;

/**
 * @version 1.0.0
 *
 * Link
 * 
 */
class Link extends HtmlElement implements HtmlElementInterface
{ 
    static public function elementName(): string
    {
        return Elements::Link()[0];
    }  

    static public function categories(): array
    {
        return Content::metadata();
    }

    static public function contexts(): array
    {
        return Elements::metadata();
    }

    static public function requiredAttributes(): array
    {
        return Content::href();
    }

    static public function optionalAttributes(): array
    {
        return array_merge(
            parent::optionalAttributes(),
            Content::href(),
            Content::crossorigin(),
            Content::rel(),
            Content::media(),
            Content::hreflang(),
            Content::type(),
            Content::sizes()
        );
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }
    
    static protected function prepare(&$config)
    {
        // Sizes only applies to icon rel;
        // therefore, remove sizes, if set.
        if ( isset($config['rel']) 
          && $config['rel'] !== 'icon' 
          && isset($config['attributes']['sizes']) ) {
            unset($config['attributes']['sizes']);
          
        }
    }    
}