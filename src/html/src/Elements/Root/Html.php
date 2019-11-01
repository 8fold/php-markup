<?php

namespace Eightfold\Html\Elements\Root;

use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\HtmlElementInterface;

use Eightfold\Html\Elements\Root\Doctype;

use Eightfold\Html\Data\Elements;

use Eightfold\Html\Data\Attributes\Content;



/**
 * @version 1.0.0
 *
 * Html
 *
 * The root element of a document using hypertext markup language. This element wraps
 * all other elements. If you are familiar with XML, this is the designated root
 * element. Further, just like in XML, a doctype declaration is recommended, if not
 * required, it is recommend that HTML document be opened with a doctype. Therefore,
 * using Eightfold\Html\Html::html() will generate the doctype as well as the `html`
 * element.
 *
 * Optional keys
 *
 * - **lang:** (Default is `en`glish.) The language of the document. While it is only
 *   recommended that a language be set, the library makes this a requirement as a best
 *   practice.
 * - **head:** The metadata for the document.
 * - **body:** The rendered content of the document.
 * - **globals:** All global content and ARIA attributes as well as event types are
 *   also valid.
 *
 */
class Html extends HtmlElement implements HtmlElementInterface
{
    static public function build(array $config = []): string
    {
        return Doctype::build() . parent::build($config);
    }

    static public function elementName(): string
    {
        return Elements::html()[0];
    }

    static public function categories(): array
    {
        return [];
    }

    static public function contexts(): array
    {
        return array_merge(Elements::root(), Elements::subdocument());
    }

    static public function contentModel(): array
    {
        return array_merge(
            Elements::head(),
            Elements::body()
        );
    }

    static public function requiredAttributes(): array
    {
        return Content::lang();
    }

    static public function deprecatedAttributes(): array
    {
        return array_merge(parent::deprecatedAttributes(), Content::manifest());
    }

    static public function defaultAriaRole(): string
    {
        return '';
    }

    static public function configKeysToConvertToElements(): array
    {
        return [
            ['key' => 'head', 'element' => 'head'],
            ['key' => 'body', 'element' => 'body']
        ];
    }

    static protected function prepare(&$config)
    {
        // Strip any content that may be there.
        if (isset($config['content'])) {
            unset($config['content']);
        }

        if (!parent::hasAttributes($config)) {
            $config['attributes'] = [];
        }

        if (!parent::hasAttribute($config, 'lang')) {
            $config['attributes']['lang'] = 'en';
        }
    }
}

