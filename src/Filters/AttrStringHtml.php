<?php
declare(strict_types=1);

namespace Eightfold\Markup\Filters;

use Eightfold\Foldable\Filter;

use Eightfold\HtmlSpec\Read\HtmlAttributeIndex;

class AttrStringHtml extends Filter
{
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

    public function __invoke(array $using): string
    {
        if (empty($using)) {
            return "";
        }

        $index = HtmlAttributeIndex::init();

        // TODO: sort other attribute types
        $orderedAttributes = static::ORDERED;
        $orderedAttributes = array_fill_keys($orderedAttributes, "");

        $eventAttributes   = [];
        $dataAttributes    = [];
        $globalAttributes  = [];
        $otherAttributes   = [];
        $booleanAttributes = [];

        $build = [];
        foreach ($using as $attr => $content) {
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
            if ($attr === $content) {
                $build[] = "{$attr}";

            } else {
                $build[] = "{$attr} {$content}";

            }
        }

        return AttrString::apply()->unfoldUsing($build);
    }
}
