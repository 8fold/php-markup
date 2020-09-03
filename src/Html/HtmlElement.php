<?php

namespace Eightfold\Markup\Html;

use Eightfold\Markup\Element;

use Eightfold\Shoop\Shoop;

use Eightfold\HtmlSpecStructured\Read\HtmlIndex;
use Eightfold\HtmlSpecStructured\Read\HtmlAttributeIndex;

use Eightfold\Markup\Filters\AttrString;

class HtmlElement extends Element
{
    private $elementReference;
    private $elementDefinition;

    const ORDERED = [
        "is",
        "role",
        "id",
        "class",
        "style",
        "type",
        "media",
        "tabindex",
        "accesskey",
        "width",
        "height",
        "lang",
        "srclang",
        "hreflang",
        "dir",
        "translate",
        "src",
        "rel",
        "href",
        "target",
        "itemtype",
        "itemref",
        "itemprop",
        "title",
        "name",
        "http-equiv",
        "charset",
        "alt",
        "value",
        "content",
        "manifest",
        "contenteditable",
        "spellcheck",
        "start"
    ];

    const OTHER = [];

    const BOOLEAN = [];

    public function elementDefinition()
    {
        if ($this->elementDefinition === null) {
            $this->elementReference = HtmlIndex::all()->indexForElementNamed($this->main);

            $structured = (array) HtmlIndex::all()->elementNamed($this->main)
                ->element();

            $parts = explode("/", __DIR__);
            $parts = array_slice($parts, 0, -1);
            $parts[] = "json";
            $parts = array_merge($parts, $this->elementReference);
            $path = implode("/", $parts);
            $json = file_get_contents($path);
            $extension = json_decode($json, true);
            $this->elementDefinition = array_merge($structured, $extension);
        }
        return $this->elementDefinition;
    }

    public function attrString()
    {
        $index = HtmlAttributeIndex::init();

        // TODO: sort other attribute types
        $orderedAttributes = static::ORDERED;
        $orderedAttributes = array_fill_keys($orderedAttributes, "");

        $eventAttributes   = [];
        $dataAttributes    = [];
        $globalAttributes  = [];
        $otherAttributes   = [];
        $booleanAttributes = [];

        $attributes = $this->attrList(false);

        $build = [];
        foreach ($attributes as $attr => $content) {
            if (array_key_exists($attr, $orderedAttributes)) {
                $orderedAttributes[$attr] = $content;

            } elseif ($index->hasComponentNamed($attr) and
                $a = $index->componentNamed($attr)
            ) {
                if ($a->isEvent()) {
                    $eventAttributes[$attr] = $content;

                } elseif ($a->isData()) {
                    $dataAttributes[$attr] = $content;

                } elseif ($a->isGlobal()) {
                    $globalAttributes[$attr] = $content;

                } elseif ($a->isOther()) {
                    $otherAttributes[$attr] = $content;

                } elseif ($a->isBoolean()) {
                    $booleanAttributes[$attr] = $content;

                }

            } else {
                $otherAttributes[$attr] = $content;

            }
        }

        $orderedAttributes = array_filter($orderedAttributes);

        $eventAttributes = array_filter($eventAttributes);
        ksort($eventAttributes);

        $dataAttributes = array_filter($dataAttributes);
        ksort($eventAttributes);

        $globalAttributes = array_filter($globalAttributes);
        ksort($globalAttributes);

        $otherAttributes = array_filter($otherAttributes);
        ksort($otherAttributes);

        $booleanAttributes = array_filter($booleanAttributes);
        ksort($booleanAttributes);

        $merged = array_merge(
            $orderedAttributes,
            $eventAttributes,
            $dataAttributes,
            $globalAttributes,
            $otherAttributes,
            $booleanAttributes
        );

        $build = [];
        foreach ($merged as $attr => $content) {
            $build[] = "{$attr} {$content}";
        }

        return AttrString::apply()->unfoldUsing($build);
    }

    public function unfold()
    {
        if (HtmlIndex::init()->hasComponentNamed($this->main) and
            $element = HtmlIndex::init()->componentNamed($this->main) and
            ! $element->acceptsChildren()
        ) {
            $this->omitEndTag = true;
        }
        return parent::unfold();
    }
}
