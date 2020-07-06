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

    protected $attributes;

    protected $omitEndTag = false;

    static public function fold($element, ...$content)
    {
        return new static($element, ...$content);
    }

    static public function __callStatic($element, $args)
    {
        return static::fold($element, ...$args);
    }

    public function __construct($element, ...$content)
    {
        $this->element = Type::sanitizeType($element, ESString::class)
            ->replace(["_" => "-"]);
        $this->content = Type::sanitizeType($content, ESArray::class);
        $this->attributes = Shoop::dictionary([]);
    }

    public function unfold()
    {
        return Shoop::string($this->element)
            ->start("<")->plus($this->compiledAttributes())->end(">")
            ->plus($this->compiledContent())->plus(
                ($this->omitEndTag)
                    ? ""
                    : Shoop::string($this->element)->start("</")->end(">")
            )->unfold();
    }

    public function attr(string ...$attributes): Element
    {
        if ($this->attributes === null) {
            $this->attributes = Shoop::dictionary([]);
        }

        Shoop::array($attributes)->each(function($string) {
                list($attr, $value) = Shoop::string($string)
                    ->divide(" ", false, 2);
                $this->attributes = $this->attributes->plus($value, $attr);
            });

        return $this;
    }

    protected function attributes(): ESArray
    {
        if ($this->attributes === null) {
            return Shoop::array([]);
        }
        return $this->attributes->each(function($value, $attr) {
            return "{$attr} {$value}";
        });
    }

    public function extends($extends): Element
    {
        $extends = Type::sanitizeType($extends, ESString::class);
        $elem = $this->element;

        $this->element = $extends;
        $this->attr("is {$elem}");

        return $this;
    }

    public function omitEndTag(bool $omit = true): Element
    {
        $this->omitEndTag = $omit;
        return $this;
    }

    protected function compiledElement()
    {
        return $this->element;
    }

    protected function compiledAttributes(): string
    {
        return $this->attributes->each(function($value, $attribute) {
                return ($attribute === $value and strlen($attribute) > 0)
                    ? $attribute : "{$attribute}=\"{$value}\"";

            })->isEmpty(function($result, $array) {
                return ($result->unfold()) ? "" : $array->join(" ")->start(" ");

            });
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

    public function __toString()
    {
        return $this->unfold();
    }
}
