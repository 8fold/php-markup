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

    protected $attributes;

    protected $omitEndTag = false;

    static public function fold($element, ...$content)
    {
        return new static($element, ...$content);
    }

    public function __construct($element, ...$content)
    {
        $this->element = Type::sanitizeType($element, ESString::class)
            ->replace(["_" => "-"]);
        $this->content = Type::sanitizeType($content, ESArray::class);
        $this->attributes = Shoop::dictionary([]);
    }

    public function unfold(string ...$attributes)
    {
        $this->attr(...$attributes);
        $elem = $this->compiledElement();
        $attr = $this->compiledAttributes();
        $cont = $this->compiledContent();
        return Shoop::string($elem)->start("<")->plus($attr)->end(">")
            ->plus($cont)->plus(
                ($this->omitEndTag)
                    ? ""
                    : Shoop::string($elem)->start("</")->end(">")
            )->unfold();
    }

    public function attr(string ...$attributes): Element
    {
        Shoop::array($attributes)->each(function($string) {
                list($attribute, $value) = Shoop::string($string)
                    ->divide(" ", false, 2);
                $this->attributes = $this->attributes->plus($value, $attribute);
            });
        return $this;
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
        $elem = $this->element;
        if (strlen($this->extends) > 0) {
            $elem = $this->extends;
            $this->attributes[] = "is {$this->element}";
        }
        return $elem;
    }

    protected function compiledAttributes(): string
    {
        return $this->attributes->each(function($value, $attribute) {
                return ($attribute === $value && strlen($attribute) > 0)
                    ? $attribute : "{$attribute}=\"{$value}\"";

            })->isEmpty(function($result, $array) {
                return ($result) ? "" : $array->join(" ")->start(" ");

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
