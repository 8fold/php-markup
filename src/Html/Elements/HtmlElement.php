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

    /**
     * @deprecated
     */
    // protected function compiledElement(): string
    // {
    //     $elem = parent::compiledElement();
    //     if (get_class($this) === Html::class) {
    //         $this->prefix = "<!doctype html>";
    //         $this->attr("lang en");

    //     }
    //     return $elem;
    // }

    // TODO: I don't know if there's a way to speed this up, but would like to.
    //      HTML effectively doubles the time of Element. Two possible areas
    //      I can think of: 1) is here, 2) the other is in data aggregating. I
    //      base this primarily on that effectively describing the entirety of
    //      unique code in HTML.
    public function attrString(ESDictionary $dict = null): ESString
    {
        $ordered   = Shoop::dictionary([]);
        $events    = Shoop::dictionary([]);
        $aria      = Shoop::dictionary([]);
        $data      = Shoop::dictionary([]);
        $other     = Shoop::dictionary([]);
        $boolean   = Shoop::dictionary([]);
        $leftovers = Shoop::dictionary([]);

        // TODO: Performance test each of this aggregations.
        $allAriaRoles = static::allAriaRoles();
        $orderedList = Ordered::order();
        $optionalEventAttributes = static::optionalEventAttributes();
        $optionalAriaAttributes = static::optionalAriaAttributes();
        $otherList = Shoop::array(static::requiredAttributes())
            ->plus(...static::optionalAttributes());
        $booleans = Content::booleans();
        // TODO: Shouldn't need to call flatten() I don't think
        $validAttributes = Shoop::array([])
            ->plus(...$optionalEventAttributes)
            ->plus(...$optionalAriaAttributes)
            ->plus(...$otherList)->flatten()->unfold();
        $validAttributes = Shoop::array($validAttributes);

        $this->attrList(false)->each(function($value, $member) use (
                &$ordered, &$events, &$aria, &$data, &$other, &$boolean, &$leftovers,
                $allAriaRoles, $orderedList, $optionalEventAttributes, $optionalAriaAttributes, $otherList, $validAttributes, $booleans
            ) {

            if ($validAttributes->hasUnfolded($member)) {
                if ($member === "role") {
                    if ($allAriaRoles->hasUnfolded($value) and $value !== static::defaultAriaRole()) {
                        $ordered = $ordered->plus($value, $member);
                    }

                } elseif ($orderedList->hasUnfolded($member)) {
                    $ordered = $ordered->plus($value, $member);

                } elseif ($optionalEventAttributes->hasUnfolded($member)) {
                    $events = $events->plus($value, $member);

                } elseif ($optionalAriaAttributes->hasUnfolded($member)) {
                    $aria = $aria->plus($value, $member);

                } elseif (Shoop::string($member)->startsWithUnfolded("data-")) {
                    $data = $data->plus($value, $member);

                } elseif ($otherList->hasUnfolded($member)) {
                    $other = $other->plus($value, $member);

                } elseif ($booleans->hasUnfolded($member)) {
                    $boolean = $boolean->plus($value, $member);

                // } else {
                //     if ($this->isKnownElement) {
                //         $errorComment = "<!-- The {$member} attribute is not valid for the {$this->element} element -->";
                //     }

                //     $leftovers = $leftovers->plus($value, $member);

                }
            }
        });

        $order = Shoop::dictionary([]);

        Shoop::array(Ordered::order())->each(
            function($member) use (&$ordered, &$order) {
                if ($ordered->hasMemberUnfolded($member)) {
                    $order = $order->plus($ordered[$member], $member);
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

    public function unfold()
    {
        $elem = parent::compiledElement();
        if (get_class($this) === Html::class) {
            $this->prefix = "<!doctype html>";
            $this->attr("lang en");

        }

        $string = Shoop::string(parent::unfold());
        if (get_class($this) === Html::class) {
            $string = $string->start("<!doctype html>");
            return $string->unfold();

        } elseif (static::shouldOmitEndTag()) {
            return $string->minus("</{$this->main()}>")->unfold();

        }
        return $string->unfold();
    }

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
        return Shoop::array(static::contentModel())->isEmpty;
        // return (count(static::contentModel()) > 0) ? false : true;

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

    static public function optionalAriaRoles(): ESArray
    {
        return Shoop::array(Aria::globals());
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
