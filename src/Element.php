<?php

namespace Eightfold\Markup;

use Eightfold\Shoop\Helpers\Type;

use Eightfold\Shoop\{
    Shoop,
    ESArray,
    ESString
};

class Element
{
    protected $element;

    protected $content;

    protected $extends;

    protected $omitEndTag = false;

    protected $attributes = [];

    static public function fold($element, ...$content)
    {
        return new static($element, ...$content);
    }

    public function __construct($element, ...$content)
    {
        $this->element = Type::sanitizeType($element, ESString::class)
            ->replace("_", "-");
        $this->content = Type::sanitizeType($content, ESArray::class);
    }

    public function unfold()
    {
        return Shoop::string($this->compiledElement())->start("<")->plus(
            $this->compiledAttributes()
        )->end(">")->plus(
            $this->content->each(function($value) {
                if (is_string($value) || is_int($value)) {
                    return (string) $value;

                } elseif (is_a($value, Element::class) || is_subclass_of($value, Element::class)) {
                    return $value->unfold();

                }
            })->join("")
        )->plus(
            ($this->omitEndTag) ? "" : Shoop::string($this->compiledElement())->start("</")->end(">")
        )->unfold();
    }

    public function attr(string ...$attributes): Element
    {
        if ($this->attributes === null) {
            $this->attributes = Shoop::array($attributes)->unfold();

        } else {
            $current = $this->attributes;
            $new = $attributes;
            $merged = array_merge($current, $new);
            $unique = array_unique($merged);
            $this->attributes = Shoop::array($unique)->unfold();

        }
        return $this;
    }

    public function extends($extends): Element
    {
        $extends = Type::sanitizeType($extends, ESString::class);
        $this->extends = $extends;
        return $this;
    }

    public function omitEndTag(bool $omit = true): Element
    {
        $this->omitEndTag = $omit;
        return $this;
    }

    protected function compiledElement()
    {
        $elem = $this->element;
        if (strlen($this->extends) > 0) {
            $elem = $this->extends;
            $this->attributes[] = "is {$this->element}";
        }
        return $elem;
    }

    protected function compiledAttributes(): string
    {
        $compiled = Shoop::array($this->attributes)->each(function($attribute) {
            list($member, $value) = explode(" ", $attribute, 2);
            return ($member === $value && strlen($member) > 0)
                ? $member : "{$member}=\"{$value}\"";
        });

        if ($compiled->int()->isGreaterThanUnfolded(0)) {
            return $compiled->join(" ")->start(" ");
        }
        return "";
    }

    public function __toString()
    {
        return $this->unfold();
    }
}
