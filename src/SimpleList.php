<?php

namespace Eightfold\Markup;

use Eightfold\XMLBuilder\Contracts\Buildable;

use Eightfold\HTMLBuilder\Element as HtmlElement;

class SimpleList implements Buildable
{
    /**
     * @var array<HtmlElement|string>
     */
    private array $items = [];

    private string $type = 'unordered';

    /**
     * @var array<string>
     */
    private array $properties = [];

    public static function create(string|Buildable ...$items): SimpleList
    {
        return new SimpleList(...$items);
    }

    /**
     * @param HtmlElement|string $items [description]
     */
    public function __construct(string|Buildable ...$items)
    {
        $this->items = $items;
    }

    public function props(string ...$properties): SimpleList
    {
        $this->properties = $properties;

        return $this;
    }

    public function build(): string
    {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = HtmlElement::li($item);
        }

        $elem = HtmlElement::ul(...$items);
        if ($this->type === 'ordered') {
            $elem = HtmlElement::ol(...$items);
        }

        if (count($this->properties) > 0) {
            $elem = $elem->props(...$this->properties);
        }

        return $elem->build();
    }

    public function __toString(): string
    {
        return $this->build();
    }

    public function ordered(): SimpleList
    {
        $this->type = 'ordered';
        return $this;
    }
}
