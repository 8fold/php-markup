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
    const openingFormat = "<%s%s>";

    protected $element = '';

    protected $content = [];

    protected $extends = '';

    protected $omitEndTag = false;

    protected $attributes = [];

    static public function fold($element, ...$content)
    {
        return new static($element, ...$content);
    }

    public function __construct($element, ...$content)
    {
        $this->element = Type::sanitizeType($element, ESString::class)
            ->replace("_", "-")->unfold();
        $this->content = Type::sanitizeType($content, ESArray::class)
            ->unfold();
    }

    public function unfold()
    {
        $elem = $this->element;
        if (strlen($this->extends) > 0) {
            $elem = $this->extends;
            $this->attr("is {$this->element}");
        }

        // $attributes = Shoop::dictionary($this->attributes)
        //     ->each(function($value, $key) {
        //         var_dump($value);
        //         var_dump($key);
        //         return "{$key}=\"{$value}\"";
        //     })->join(" ")->unfold();
        // var_dump($attributes);

        $attributes = Shoop::array([]);
        foreach ($this->attributes as $key => $value) {
            // TODO: Write test regarding single attributes like required
            if ($key === $value && strlen($value) > 0) {
                $attributes = $attributes->plus($value);

            } else {
                $attributes = $attributes->plus("{$key}=\"{$value}\"");

            }
        }
        $attributes = $attributes->join(" ");
        if (strlen($attributes) > 0) {
            $attributes = $attributes->start(" ");
        }

        $opening = "<{$elem}{$attributes}>";

        $content = "";
        foreach ($this->content as $value) {
            if (is_string($value) || is_int($value)) {
                $content .= (string) $value;

            } elseif (is_a($value, Element::class) || is_subclass_of($value, Element::class)) {
                $content .= $value->unfold();

            }
        }

        $closing = "</{$elem}>";
        if ($this->omitEndTag) {
            $closing = "";
        }
        return $opening . $content . $closing;
    }

    public function attr(string ...$attributes): Element
    {
        foreach ($attributes as $attribute) {
            if (strlen($attribute) > 0) {
                list($key, $value) = Shoop::string($attribute)->divide(" ")->unfold();
                $this->attributes[$key] = $value;
            }
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

    public function __toString()
    {
        return $this->unfold();
    }
}
