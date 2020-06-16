<?php

namespace Eightfold\Markup\Html\Elements;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\ESDictionary;
use Eightfold\Shoop\ESArray;

use Eightfold\Markup\Element;

// use Eightfold\Markup\Html;

use Eightfold\Markup\Html\Elements\Root\Html;

use Eightfold\Markup\Html\Data\Elements;
use Eightfold\Markup\Html\Data\Attributes\Ordered;
use Eightfold\Markup\Html\Data\Attributes\Content;
use Eightfold\Markup\Html\Data\Attributes\Aria;
use Eightfold\Markup\Html\Data\Attributes\EventOn;

abstract class HtmlElement extends Element
{
    private $isKnownElement = true;

    private $prefix = "";

    private $is = "";

    protected function compiledElement(): string
    {
        $elem = parent::compiledElement();
        if (get_class($this) === Html::class) {
            $this->prefix = "<!doctype html>";
            $this->attr("lang en");

        }
        return $elem;
    }

    protected function compiledAttributes(): string
    {
        $ordered   = Shoop::dictionary([]);
        $events    = Shoop::dictionary([]);
        $aria      = Shoop::dictionary([]);
        $data      = Shoop::dictionary([]);
        $other     = Shoop::dictionary([]);
        $boolean   = Shoop::dictionary([]);
        $leftovers = Shoop::dictionary([]);

        $this->attributes->each(function($value, $member) use
            (&$ordered, &$events, &$aria, &$data, &$other, &$boolean, &$leftovers) {

            $inAriaRoles = in_array($value, static::allAriaRoles()->unfold());
            $inOrdered   = in_array($member, Ordered::order());
            $inEvents    = in_array($member, static::optionalEventAttributes());
            $inAria      = in_array($member, static::optionalAriaAttributes());
            $inData      = Shoop::string($member)->startsWithUnfolded("data-");
            $inOther     = in_array($member, array_merge(static::requiredAttributes(), static::optionalAttributes()));
            $inBoolean   = in_array($member, Content::booleans());

            if ($member === "role") {
                if ($inAriaRoles and $value !== static::defaultAriaRole()) {
                    $ordered = $ordered->plus($value, $member);
                }

            } elseif ($inOrdered and
                in_array($member, array_merge(static::requiredAttributes(), static::optionalAttributes()))
            ) {
                $ordered = $ordered->plus($value, $member);

            } elseif ($inEvents) {
                $events = $events->plus($value, $member);

            } elseif ($inAria) {
                $aria = $aria->plus($value, $member);

            } elseif ($inData) {
                $data = $data->plus($value, $member);

            } elseif ($inOther) {
                $other = $other->plus($value, $member);

            } elseif ($inBoolean) {
                $boolean = $boolean->plus($value, $member);

            // } else {
            //     if ($this->isKnownElement) {
            //         $errorComment = "<!-- The {$member} attribute is not valid for the {$this->element} element -->";
            //     }

            //     $leftovers = $leftovers->plus($value, $member);

            }
        });

        $order = Shoop::dictionary([]);
        Shoop::array(Ordered::order())->each(
            function($member) use (&$ordered, &$order) {
                if ($ordered->hasMemberUnfolded($member)) {
                    $order = $order->plus($ordered->{$member}, $member);
                }
            });

        $this->attributes = Shoop::dictionary([])
            ->plus(...$order->interleave())
            ->plus(...$events->sortMembers()->interleave())
            ->plus(...$aria->sortMembers()->interleave())
            ->plus(...$data->sortMembers()->interleave())
            ->plus(...$other->sortMembers()->interleave())
            ->plus(...$boolean->sortMembers()->interleave())
            // ->plus(...$leftovers->sortMembers()->interleave())
            ->noEmpties();

        return parent::compiledAttributes();
    }

    private function isKnownElement()
    {
        return (in_array($this->element, Elements::all()));
    }

    private function allAriaRoles()
    {
        return Shoop::array([static::defaultAriaRole()])
            ->plus(...static::optionalAriaRoles());
    }

    public function unfold(): string
    {
        $this->compiledElement();
        $this->isKnownElement = $this->isKnownElement();
        if (static::shouldOmitEndTag()) {
            $this->omitEndTag();
        }
        return $this->prefix . parent::unfold();
    }

    /**
     * @deprecated
     */
    protected function getAttr(): ESArray
    {
        return $this->attributes();
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
