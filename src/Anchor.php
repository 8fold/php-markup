<?php

namespace Eightfold\Markup;

use Eightfold\HTMLBuilder\Element;

class Anchor
{
    private string $content = '';

    private string $href = '';

    /**
     * @var array<string>
     */
    private array $properties = [];

    public static function create(string $content, string $href): Anchor
    {
        return new Anchor($content, $href);
    }

    public function __construct(string $content, string $href)
    {
        $this->content = $content;

        $this->href = $href;
    }

    public function props(string ...$properties): Anchor
    {
        $this->properties = $properties;

        return $this;
    }

    public function build(): string
    {
        return Element::a($this->content)
            ->props('href ' . $this->href, ...$this->properties);
    }
}
