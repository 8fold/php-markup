<?php

namespace Eightfold\Markup\Html;

use Eightfold\Markup\Element;

use Eightfold\Shoop\Shoop;

use Eightfold\HtmlSpecStructured\PhpToJson\HtmlIndex;

use Eightfold\Markup\Filters\AttrString;

class HtmlElement extends Element
{
    private $elementReference;
    private $elementDefinition;

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
        $attributes = $this->attrList(false);

        $orderedAttributes = [
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
        $ordered = array_fill_keys($orderedAttributes, "");
        $ordered = array_intersect_key($attributes, $ordered);
        $ordered = array_filter($ordered);

        $build = [];
        foreach ($attributes as $attr => $content) {
            if ($attr === "role") {
                $def = $this->elementDefinition();
                if (isset($def["aria"]["roles"]) and in_array($content, $def["aria"]["roles"])) {
                    $build[] = "{$attr} {$content}";
                }

            } else {
                $build[] = "{$attr} {$content}";

            }
        }

        return AttrString::apply()->unfoldUsing($build);
    }
}
