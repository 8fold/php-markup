<?php

namespace Eightfold\Markup;

use Eightfold\Shoop\Helpers\Type;

use Eightfold\Foldable\Foldable;
use Eightfold\Foldable\FoldableImp;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\Apply;

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
        // TODO: Switch to using Shoop, see how it impacts performance
        $args    = Shoop::this($args);
        $element = $args->at(0)->unfold();
        if ($args->length()->is(1)->unfold()) {
            return new static($element);
        }

        $args = $args->dropAt(0)->retain(function($v) {
            $v = Shoop::this($v);
            return $v->isArray()->reversed()->unfold() and
                $v->isBoolean()->reversed()->unfold();
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

    public function args($includeMain = false)
    {
        $args = [];

        if ($includeMain) {
            $args[] = $this->main;
        }

        $args[] = $this->attributes;
        $args[] = $this->omitEndTag;

        if (Shoop::this($this->content)->isEmpty()->reversed()->unfold()) {
            $args[] = $this->content;
        }

        return $args;
    }

    // TODO: PHP 8.0 bool|ESBool
    public function omitEndTag(bool $omit = null)// TODO: PHP 8.0 : static|bool
    {
        if ($omit === null) {
            return $this->omitEndTag;

        } elseif (Shoop::this($omit)->efIsBoolean()) {
            $this->omitEndTag = $omit;

        }

        return $this;
    }

    /**
     * attr = setter/override
     *
     * attrList = x="y" or ESDictionary
     *
     */
    public function attr(string ...$attributes): Element
    {
        $this->attributes = Shoop::this(
            $this->attrList(false)
        )->append(
            AttrDictionary::apply()->unfoldUsing($attributes)
        )->each(
            function($v, $m, &$build) {
                $build[] = Shoop::this($m)->append(" ")->append($v)->unfold();
            }
        )->unfold();

        return $this;
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
        // TODO: some type of str_replace for Shooped
        $main = str_replace("_", "-", $this->main);

        $base = Shoop::this($main)->prepend("<")->append(
                $this->attrString()
            )->append(">");

        if (Shoop::this($this->omitEndTag)->unfold()) {
            return $base->unfold();
        }

        $base = $base->append(
            Shoop::this($this->content)->each(function($v, $m, &$build) {
                if (Apply::isString()->unfoldUsing($v)) {
                    $build[] = $v;

                } elseif (is_a($v, Foldable::class)) {
                    $build[] = $v->unfold();

                }
            })->efToString()
        );
        return $base->append("</")->append($main)->append(">")->unfold();
    }

    public function __toString(): string
    {
        return $this->unfold();
    }
}
