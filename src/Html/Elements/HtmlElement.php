<?php

namespace Eightfold\Markup\Html\Elements;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Element;

use Eightfold\Markup\Html\Elements\AttributeHandler;

use Eightfold\Markup\Html;

use Eightfold\Markup\Html\Elements\Root\Html as RootHtml;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\Attributes\Ordered;
use Eightfold\Markup\Html\Data\Attributes\Content;
use Eightfold\Markup\Html\Data\Attributes\Aria;
use Eightfold\Markup\Html\Data\Attributes\EventOn;

abstract class HtmlElement extends Element
{
    use AttributeHandler;

    private $isKnownElement = true;

    private $prefix = "";

    private $is = "";

    protected function compiledElement(): string
    {
        $elem = parent::compiledElement();
        if (get_class($this) === RootHtml::class) {
            $this->prefix = "<!doctype html>";
            $this->attr("lang en");

        }
        return $elem;
    }

    protected function compiledAttributes(): string
    {
        // TODO: Test beyond ordered
        $ordered = [];
        $events = [];
        $aria = [];
        $data = [];
        $other = [];
        $boolean = [];
        $leftovers = [];
        Shoop::array($this->attributes)->each(function($attribute) use
            (&$ordered, &$events, &$aria, &$data, &$other, &$boolean, &$leftovers) {
            list($member, $value) = explode(" ", $attribute, 2);

            if ($member === "role") {
                if (in_array($value, static::allAriaRoles()) && $value !== static::defaultAriaRole()) {
                    $ordered[$member] = $value;
                }

            } elseif (in_array($member, Ordered::order()) && in_array($member, array_merge(static::requiredAttributes(), static::optionalAttributes()))) {
                $ordered[$member] = $value;

            } elseif (in_array($member, static::optionalEventAttributes())) {
                $events[$member] = $value;

            } elseif (in_array($member, static::optionalAriaAttributes())) {
                $aria[$member] = $value;

            } elseif (Shoop::string($member)->startsWithUnfolded("data-")) {
                $data[$member] = $value;

            } elseif (in_array($member, array_merge(static::requiredAttributes(), static::optionalAttributes()))) {
                $other[$member] = $value;

            } elseif (in_array($member, Content::booleans())) {
                $boolean[$member] = $value;

            } else {
                $leftovers[$member] = $value;

            }
        });

        $order = [];
        Shoop::array(Ordered::order())->each(function($value) use (&$ordered, &$order) {
            if (array_key_exists($value, $ordered)) {
                $order[$value] = $ordered[$value];
            }
        });

        ksort($events, SORT_NATURAL | SORT_FLAG_CASE);
        ksort($aria, SORT_NATURAL | SORT_FLAG_CASE);
        ksort($data, SORT_NATURAL | SORT_FLAG_CASE);
        ksort($other, SORT_NATURAL | SORT_FLAG_CASE);
        ksort($boolean, SORT_NATURAL | SORT_FLAG_CASE);

        $compiled = Shoop::dictionary(array_merge($order, $events, $aria, $data, $other, $boolean))
            ->each(function($value, $member) {
                if ($member === $value) {
                    return $member;

                } else {
                    return "{$member}=\"{$value}\"";

                }
            });

        if ($compiled->int()->isGreaterThanUnfolded(0)) {
            return $compiled->join(" ")->start(" ");
        }
        return "";
    }

    private function isKnownElement()
    {
        if (strlen($this->extends) > 0) {
            return (in_array($this->extends, Elements::all()));
        }
        return (in_array($this->element, Elements::all()));
    }

    private function allAriaRoles()
    {
        return array_merge([static::defaultAriaRole()], static::optionalAriaRoles());
    }

    public function unfold()
    {
        $this->compiledElement();
        $this->isKnownElement = $this->isKnownElement();
        if (static::shouldOmitEndTag()) {
            $this->omitEndTag();
        }
        return $this->prefix . parent::unfold();
    }

    protected function getAttr(): array
    {
        return $this->attributes;
    }

    /** HTML specification-related */

    static protected function contentModel(): array
    {
        return [];
    }

    static public function shouldOmitEndTag(): bool
    {
        if (count(static::contentModel()) > 0) {
            return false;
        }
        return true;
    }

    static public function requiredAttributes(): array
    {
        return [];
    }

    static public function optionalAttributes(): array
    {
        return Content::globals();
    }

    static public function deprecatedAttributes(): array
    {
        return Content::deprecated();
    }

    static public function optionalEventAttributes(): array
    {
        return EventOn::globals();
    }

    static public function optionalAriaRoles(): array
    {
        return Aria::globals();
    }

    static public function deprecatedAriaRoles(): array
    {
        return [];
    }

    static public function requiredAriaAttributes(): array
    {
        return [];
    }

    static public function optionalAriaAttributes(): array
    {
        return Aria::globals();
    }

    static public function deprecatedAriaAttributes(): array
    {
        return [];
    }

    static protected function requiredConfigKeys(): array
    {
        return [];
    }

    static public function configKeysToConvertToElements(): array
    {
        return [];
    }
}
