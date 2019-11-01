<?php

namespace Eightfold\Html\Elements\Metadata;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Data\Elements;

/**
 * @version 1.0.0
 *
 * Head
 *
 * Holds metadata related to the HTML document.
 *
 * Optional keys
 *
 * - **title:**   To fail gracefully, if the title is not set, a page title of "Unknown
 *                page title" will be used.
 * - **base:**
 * - **meta:**    Array of `meta` configurations.
 * - **links:**   Array of `link` configurations.
 * - **styles:**  Array of `style` configurations.
 * - **scripts:** Array of `script` configurations.
 * 
 */
class Head extends HtmlElement implements HtmlElementInterface
{ 
    static public function elementName(): string
    {
        return Elements::head()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return Elements::html();
    }

    static protected function contentModel(): array
    { 
        return array_merge(Elements::metadata(), Elements::title(), Elements::base());
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    public static function configKeysToConvertToElements(): array
    { 
        return [
            ['key' => 'title',   'element' => 'title'],
            ['key' => 'base',    'element' => 'base'],
            ['key' => 'meta',    'element' => 'meta',   'multiple' => true],
            ['key' => 'links',   'element' => 'link',   'multiple' => true],
            ['key' => 'styles',  'element' => 'style',  'multiple' => true],
            ['key' => 'scripts', 'element' => 'script', 'multiple' => true]
        ]; 
    }    

    static protected function prepare(&$config)
    {
        if (!array_key_exists('title', $config)) {
            $config['title'] = [
                'content' => 'Unknown page title'
            ];
        }
    }    
}