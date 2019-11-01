<?php

namespace Eightfold\Shoop;

use Eightfold\Shoop\Helpers\Type;

use Eightfold\Shoop\Interfaces\Shooped;

use Eightfold\Shoop\Traits\ShoopedImp;

class ESElement implements Shooped
{
    use ShoopedImp;

    const openingFormat = "<%s%s>";

    protected $element = '';

    protected $extends = '';

    protected $omitEndTag = false;

    protected $attributes = [];

    static public function fold($args)
    {
        return new static($args);
    }

    public function __construct($elements)
    {
        var_dump($elements);
        $elements = Type::sanitizeType($elements, ESArray::class);
        if ($elements->count()->is(0)->unfold()) {
            trigger_error("An element must contain at least the element name.");
        }

        $this->element = Type::sanitizeType($elements[0], ESString::class)
            ->replace("_", "-");

        $elements = $elements->dropFirst();
        // unset($elements[0]);

        $this->value = ($elements->count()->is(0)->unfold())
            ? []
            : $elements->unfold();

    }

    public function unfold()
    {
        $elem = $this->element;
        if (strlen($this->extends) > 0) {
            $elem = $this->extends;
            $this->attr("is {$this->element}");
        }

        $attributes = Shoop::array([]);
        foreach ($this->attributes as $key => $value) {
            $attributes = $attributes->plus("{$key}=\"{$value}\"");
        }
        $attributes = $attributes->join(" ");
        if (strlen($attributes) > 0) {
            $attributes = $attributes->start(" ");
        }

        $opening = "<{$elem}{$attributes}>";

        $content = "";
        foreach ($this->value as $value) {
            if (Type::isShooped($value)) {
                $content .= $value->unfold();

            } else {
                $value = Type::sanitizeType($value, ESString::class);
                $content .= $value;

            }
        }

        $closing = "</{$elem}>";
        if ($this->omitEndTag) {
            $closing = "";
        }
        return $opening . $content . $closing;
    }

// - Type Juggling
    public function string(): ESString {}

    public function array(): ESArray {}

    public function dictionary(): ESDictionary {}

    public function object(): ESObject {}

    public function int(): ESInt {}

    public function bool(): ESBool {}

    public function json(): ESJson {}

// - PHP single-method interfaces
// - Math language
    public function multiply($int) {}

// - Other
    public function attr(string ...$attributes): ESElement
    {
        foreach ($attributes as $attribute) {
            if (strlen($attribute) > 0) {
                list($key, $value) = Shoop::string($attribute)->split(" ")->unfold();
                $this->attributes[$key] = $value;
            }
        }
        return $this;
    }

    public function extends($extends): ESElement
    {
        $extends = Type::sanitizeType($extends, ESString::class);
        $this->extends = $extends;
        return $this;
    }

    public function omitEndTag(bool $omit = true): ESElement
    {
        $this->omitEndTag = $omit;
        return $this;
    }
}
