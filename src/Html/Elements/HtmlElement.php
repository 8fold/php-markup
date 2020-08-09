<?php

namespace Eightfold\Markup\Html\Elements;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\ESArray;
use Eightfold\Shoop\ESDictionary;
use Eightfold\Shoop\ESString;

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

//     public function attr(string ...$attributes): Element
//     {
// var_dump(__LINE__);
// var_dump(__FILE__);
// die("filter out invalid attributes");
// // Block users from adding invalid attributes in the first place.
// // Always use and empty array when folding
// //
// // To reinstantiate new instance - maybe:
// //      protected function refreshed($this->main(), ...$this->content())->attr(...$this->attrList())->omitEndTag($this->omitEndTag);
// var_dump($attributes);
//         $dictionary = $this->attrArray(false);
// var_dump(__LINE__);
//         $attributes = Shoop::array($attributes);
// var_dump(__LINE__);
//         $attributes->each(function($item) use (&$dictionary) {
//             die("here");
//             list($attr, $value) = Shoop::string($item)->divide(" ", false, 2);
//             $dictionary = $dictionary->plus($value, $attr);
//             // die(var_dump($dictionary));
//         });
// var_dump($dictionary);
// die("here");

//         $attributes = $dictionary->each(function($value, $attr) {
//             return "{$attr} {$value}";
//         })->unfold();
// die(var_dump($attributes));
//         $content = $this->content(false);
//         $bool    = $this->omitEndTag();

//         return static::fold($this->main(),
//             ...Shoop::array($content)->plus($attributes)->plus($bool)
//         );
//     }

    public function attrString(ESDictionary $dict = null): ESString
    {
        $ordered   = Shoop::dictionary([]);
        $events    = Shoop::dictionary([]);
        $aria      = Shoop::dictionary([]);
        $data      = Shoop::dictionary([]);
        $other     = Shoop::dictionary([]);
        $boolean   = Shoop::dictionary([]);
        $leftovers = Shoop::dictionary([]);

        $this->attrList(false)->each(function($value, $member) use
            (&$ordered, &$events, &$aria, &$data, &$other, &$boolean, &$leftovers) {

            $inAriaRoles = static::allAriaRoles()->hasUnfolded($member);
            $inOrdered   = Ordered::order()->hasUnfolded($member);
            $inEvents    = static::optionalEventAttributes()->hasUnfolded($member);
            $inAria      = static::optionalAriaAttributes()->hasUnfolded($member);
            $inData      = Shoop::string($member)->startsWithUnfolded("data-");
            $inOther     = Shoop::array(static::requiredAttributes())
                ->plus(...static::optionalAttributes())->hasUnfolded($member);
            $inBoolean   = Content::booleans()->hasUnfolded($member);

            if ($member === "role") {
var_dump(__LINE__);
var_dump(__FILE__);
var_dump("role");
                if ($inAriaRoles and $value !== static::defaultAriaRole()) {
                    $ordered = $ordered->plus($value, $member);
                }

            } elseif ($inOrdered and $inOther) {
var_dump(__LINE__);
var_dump(__FILE__);
var_dump("ordered");
                $ordered = $ordered->plus($value, $member);

            } elseif ($inEvents) {
var_dump(__LINE__);
var_dump(__FILE__);
var_dump("events");
                $events = $events->plus($value, $member);

            } elseif ($inAria) {
var_dump(__LINE__);
var_dump(__FILE__);
var_dump("aria");
                $aria = $aria->plus($value, $member);

            } elseif ($inData) {
var_dump(__LINE__);
var_dump(__FILE__);
var_dump("data");
                $data = $data->plus($value, $member);

            } elseif ($inOther) {
var_dump(__LINE__);
var_dump(__FILE__);
var_dump("other");
                $other = $other->plus($value, $member);

            } elseif ($inBoolean) {
var_dump(__LINE__);
var_dump(__FILE__);
var_dump("boolean");
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

        $dict = Shoop::dictionary([])
            ->plus(...$order->interleave())
            ->plus(...$events->sortMembers()->interleave())
            ->plus(...$aria->sortMembers()->interleave())
            ->plus(...$data->sortMembers()->interleave())
            ->plus(...$other->sortMembers()->interleave())
            ->plus(...$boolean->sortMembers()->interleave())
            // ->plus(...$leftovers->sortMembers()->interleave())
            ->noEmpties();

        // die(var_dump($attr));
        return parent::attrString($dict);
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

    // public function unfold(): string
    // {
    //     $this->compiledElement();
    //     $this->isKnownElement = $this->isKnownElement();
    //     if (static::shouldOmitEndTag()) {
    //         $this->omitEndTag();
    //     }
    //     return $this->prefix . parent::unfold();
    // }

    /**
     * @deprecated
     */
    protected function getAttr(): ESArray
    {
        return $this->attrArray();
    }

    /** HTML specification-related */

    static protected function contentModel(): array
    {
        return [];
    }

    static public function shouldOmitEndTag(): bool
    {
        return (count(static::contentModel()) > 0) ? false : true;

        // if (count(static::contentModel()) > 0) {
        //     return false;
        // }
        // return true;
    }

    static public function requiredAttributes(): array
    {
        return [];
    }

    static public function optionalAttributes(): ESArray
    {
        return Content::globals();
    }

    static public function deprecatedAttributes(): array
    {
        return Content::deprecated();
    }

    static public function optionalEventAttributes(): ESArray
    {
        return Shoop::array(EventOn::globals());
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

    static public function optionalAriaAttributes(): ESArray
    {
        return Shoop::array(Aria::globals());
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
