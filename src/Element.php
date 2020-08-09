<?php

namespace Eightfold\Markup;

use Eightfold\Shoop\Helpers\Type;

use Eightfold\Shoop\{
    Interfaces\Foldable,
    Traits\FoldableImp,
    Shoop,
    ESArray,
    ESDictionary,
    ESString
};

class Element implements Foldable
{
    use FoldableImp;

    protected $element;

    protected $content;

    protected $attributes;

    protected $omitEndTag = false;

    static public function processedMain($main): string
    {
        return Type::sanitizeType($main, ESString::class)->unfold();
    }

    /**
     * May contain content, attributes, and whether to omit the end tag.
     *
     * To facilitate Shoop being able to generate a new instance without overriding
     * the metchanism already in place, the value of `args` can be the following.
     *
     * $args = [
     *     0   => {n Elements},
     *     n+1 => [],
     *     n+2 => true|false
     * ];
     *
     * We highly recommend calling `attr()` and `omitEndTag()` to set those values.
     *
     */
    static public function processedArgs(...$args): array
    {
        $args = Shoop::array($args);
        if ($args->isEmpty or is_string($args->last) or is_a($args->last(), Element::class)) {
            $args = $args->plus([], false);

        } elseif (is_array($args->last)) {
            $args = $args->plus(false);

        } elseif (is_bool($args->last)) {
            $bool = $args->last;
            $array = $args->dropLast();
            if (! is_array($array->last)) {
                $args = $args->dropLast()->plus([], $bool);

            }
        }
        return $args->unfold();
    }

    static public function __callStatic($element, $args)
    {
        $element = Shoop::string($element)->replace(["_" => "-"]);
        return static::fold($element, ...$args);
    }

    // TODO: PHP 8.0 bool|ESBool
    public function omitEndTag($omit = null)// TODO: PHP 8.0 : static|bool
    {
        if ($omit === null) {
            return Shoop::array($this->args())->last;
        }
        $omit = Type::sanitizeType($omit, ESBool::class)->unfold();
        $args = Shoop::array($this->args())->dropLast()->plus($omit);
        return static::fold($this->main(), ...$args);
    }

    /**
     * attr = setter/override
     *
     * attrList = x="y" or ESDictionary
     *
     */
    public function attr(string ...$attributes): Element
    {
// var_dump(__LINE__);
// var_dump($attributes);
        $dictionary = $this->attrList(false);
// var_dump(__LINE__);
        $attributes = Shoop::array($attributes);
// var_dump(__LINE__);
        $attributes->each(function($item) use (&$dictionary) {
            list($attr, $value) = Shoop::string($item)->divide(" ", false, 2);
            $dictionary = $dictionary->plus($value, $attr);
        });
// var_dump($dictionary);
// die("here");

        $attributes = $dictionary->each(function($value, $attr) {
            return "{$attr} {$value}";
        })->unfold();
// die(var_dump($attributes));
        $content = $this->content(false);
        $bool    = $this->omitEndTag();

        return static::fold($this->main(),
            ...Shoop::array($content)->plus($attributes)->plus($bool)
        );
    }

    // TODO: PHP 8.0 bool|ESBool -> ESArray|ESDictionary
    public function attrList($useArray = true)
    {
        $base = Shoop::array($this->args())->dropLast()->last();
        if ($useArray) {
            return $base;
        }

        $dictionary = Shoop::dictionary([]);
        $base->each(function($item) use (&$dictionary) {
            list($member, $value) = Shoop::string($item)->divide(" ", false, 2);
            $dictionary = $dictionary->plus($value, $member);
        });
        return $dictionary;
    }

    // TODO: PHP 8.0 bool|ESBool
    public function attrString(ESDictionary $dict = null): ESString
    {
        $list = $dict;
        if ($dict === null) {
            $list = $this->attrList(false);
        }

        return $list->isEmpty(function($result, $dict) {
            if ($result->unfold()) { return Shoop::string(""); }
            return $dict->each(function($value, $attr) {
                if ($attr === "is") {
                    $value = Shoop::string($value)->replace(["_" => "-"]);
                }
                return "{$attr}=\"{$value}\"";
            })->join(" ")->start(" ");
        });
    }

    public function content($unfold = false)
    {
        $unfold = Type::sanitizeType($unfold, ESBool::class)->unfold();
        return Shoop::array($this->args())->each(function($item) use ($unfold) {
            if (is_array($item)) { return ""; }
            if (is_string($item)) {
                return $item;

            } elseif ($unfold and is_a($item, Foldable::class)) {
                return $item->unfold();

            } elseif (! $unfold and ! is_array($item) and ! is_bool($item)) {
                return $item;

            }
        })->noEmpties();
    }

    public function unfold()
    {
        return Shoop::string($this->main())->start("<")->plus($this->attrString())
            ->plus(">")
            ->plus(...$this->content())
            ->plus($this->omitEndTag()
                ? ""
                : Shoop::string($this->main())->start("</")->end(">")
            )->unfold();

        return Shoop::string($this->main())->start("<")->plus(
                $this->attrList()
            )->end(">")->plus(...$this->content())->plus(
                ($this->omitEndTag())
                    ? ""
                    : Shoop::string($this->main())->start("</")->end(">")
            )->unfold();
        return Shoop::string($this->main())
            ->plus($this->compiledAttributes())
            ->plus($this->compiledContent())->plus(
                ($this->omitEndTag())
                    ? ""
                    : Shoop::string($this->main())->start("</")->end(">")
            )->unfold();
    }

    /**
     * @deprecated
     */
    protected function attributes(): ESArray
    {
        return $this->attrArray();
    }

    /**
     * @deprecated
     */
    public function extends($extends): Element
    {
        $extends = Type::sanitizeType($extends, ESString::class);
        $elem = $this->element;

        $this->element = $extends;
        $this->attr("is {$elem}");

        return $this;
    }

    /**
     * @deprecated
     */
    protected function compiledElement()
    {
        return $this->main();
    }

    /**
     * @deprecated
     */
    protected function compiledAttributes(): string
    {
        return $this->attrList();
    }

    protected function compiledContent()
    {
        return $this->content->each(function($value) {
                if (is_string($value) || is_int($value)) {
                    return (string) $value;

                } elseif (is_a($value, Element::class) || is_subclass_of($value, Element::class)) {
                    return $value->unfold();

                }
            })->join("");
    }
}
