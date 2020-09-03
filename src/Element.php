<?php

namespace Eightfold\Markup;

use Eightfold\Shoop\Helpers\Type;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Filters\AttrString;
use Eightfold\Markup\Filters\AttrDictionary;

class Element implements Foldable
{
    use FoldableImp;

    protected $content = [];

    protected $attributes = [];

    protected $omitEndTag = false;

    static public function fold(...$args): Foldable
    {
        if (count($args) === 1) {
            return new static($args[0]);
        }
        $element = $args[0];
        unset($args[0]);
        $args = array_filter($args, function($v) {
            return ! is_array($v) and ! is_bool($v);
        });
        return new static($element, [], false, ...$args);
    }

    public function __construct(string $element, array $attributes = [], bool $omitEndTag = false, ...$content)
    {
        $this->main = $element;
        $this->attributes = $attributes;
        $this->omitEndTag = $omitEndTag;
        $this->content = $content;
    }

    public function args(bool $includeMain = false): array
    {
        $args = [];

        if ($includeMain) {
            $args[] = $this->main;
        }

        $args[] = $this->attributes;
        $args[] = $this->omitEndTag;

        if (Shoop::this($this->content)->isEmpty()->reverse()->unfold()) {
            $args[] = $this->content;
        }

        return $args;
    }

    // TODO: PHP 8.0 bool|ESBool
    public function omitEndTag(bool $omit = null)// TODO: PHP 8.0 : static|bool
    {
        if ($omit === null) {
            return $this->omitEndTag;
        }

        return new Element(
            $this->main,
            $this->attributes,
            $omit,
            ...$this->content
        );
    }

    /**
     * attr = setter/override
     *
     * attrList = x="y" or ESDictionary
     *
     */
    public function attr(string ...$attributes): Element
    {
        $current = $this->attrList(false);
        $new     = AttrDictionary::apply()->unfoldUsing($attributes);

        $attributes = [];
        foreach (array_merge($current, $new) as $attr => $content) {
             $attributes[] = "{$attr} {$content}";
         }

        return new static(
            $this->main,
            $attributes,
            $this->omitEndTag,
            ...$this->content
        );
    }

    // TODO: PHP 8.0 bool|ESBool -> ESArray|ESDictionary
    public function attrList(bool $useArray = true): array
    {
        return ($useArray)
            ? $this->attributes
            : AttrDictionary::apply()->unfoldUsing($this->attributes);
    }

    public function attrString()
    {
        return AttrString::apply()->unfoldUsing($this->attributes);
    }

    public function unfold()
    {
        $main = str_replace("_", "-", $this->main);

        $attributes = $this->attrString();

        // TODO: Make variadic again, or maybe be able to take an array.
        $base = Shoop::this("<")->plus($main)->plus($attributes)->plus(">");

        // TODO: RFC example
        if (Shoop::this($this->omitEndTag)->reverse()->efToBoolean()) {
            $content = Shoop::this([]);
            foreach ($this->content as $c) {
                if (is_string($c)) {
                    $content = $content->plus($c);

                } elseif (is_a($c, Foldable::class)) {
                    $content = $content->plus($c->unfold());

                }
            }
            $base = $base->plus($content->asString())->plus("</{$main}>");
        }
        return $base->unfold();
    }
}
