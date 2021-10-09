<?php

namespace Eightfold\Markup;

use Eightfold\HTMLBuilder\Element as HtmlElement;

// use Eightfold\Markup\Html\HtmlElement;

// use Eightfold\Markup\Html;

// use Eightfold\Markup\UIKit;

class PageTitle //extends HtmlElement
{
    /**
     * @var array<string>
     */
    private array $parts = [];

    private string $separator = ' | ';

    private bool $reversed = false;

    private bool $stringOnly = false;

    /**
     * @param array<string> $parts [description]
     */
    public static function create(array $parts, $separator = ' | ')
    {
        return new PageTitle($parts, $separator);
    }

    /**
     * @param array<string> $parts [description]
     */
    public function __construct(array $parts, string $separator = ' | ')
    {
        $this->parts = $parts;

        $this->separator = $separator;
    }

    public function build(): string
    {
        if ($this->reversed) {
            $this->parts = array_reverse($this->parts);

        }

        $string = implode($this->separator, $this->parts);

        if ($this->stringOnly) {
            return $string;

        }

        return HtmlElement::title($string);
    }

    public function reversed(): PageTitle
    {
        $this->reversed = true;

        return $this;
    }

    public function stringOnly(): PageTitle
    {
        $this->stringOnly = true;

        return $this;
    }
}
