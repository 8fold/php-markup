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

    /**
     * @var array<HtmlElement|string>
     */
    private array $descriptionTerms = [];

    public static function create(...$items): SimpleList {
        return new SimpleList(...$items);
    }

    /**
     * @param HtmlElement|string $items [description]
     */
    public function __construct(...$items)
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

        $elem;
        if ($this->type === 'ordered') {
            $elem = HtmlElement::ol(...$items);

        } else {
            $elem = HtmlElement::ul(...$items);

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
