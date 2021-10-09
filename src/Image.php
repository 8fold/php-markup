<?php

namespace Eightfold\Markup;

use Eightfold\XMLBuilder\Contracts\Buildable;
use Eightfold\HTMLBuilder\Element as HtmlElement;

class Image implements Buildable
{
    private string $alt = '';

    private string $src = '';

    /**
     * @var array<string>
     */
    private array $properties = [];

    public static function create(string $alt, string $src): Image
    {
        return new Image($alt, $src);
    }

    public function __construct(string $alt, string $src)
    {
        $this->alt = $alt;
        $this->src = $src;
    }

    public function props(string ...$properties): Image
    {
        $this->properties = $properties;

        return $this;
    }

    public function build(): string
    {
        return HtmlElement::img()->omitEndTag()
            ->props(
                'alt ' . $this->alt,
                'src ' . $this->src,
                ...$this->properties
            )->build();
    }

    public function __toString(): string
    {
        return $this->build();
    }
}
