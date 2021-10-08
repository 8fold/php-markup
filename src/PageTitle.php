<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

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

    private string $separater = " | ";

    private bool $reversed = false;

    private bool $stringOnly = false;

    /**
     * @param array<string> $parts [description]
     */
    public function __construct(array $parts, string $separater = " | ")
    {
        $this->parts = $parts;

        $this->separater = $separater;
    }

    public function build(): string
    {
        return '';
        // if (count($this->main) === 0) {
        //     return "";
        // }

        // if ($this->reversed) {
        //     $this->main = array_reverse($this->main);
        // }

        // $string = implode($this->separater, $this->main);

        // if ($this->stringOnly) {
        //     return $string;
        // }

        // return Html::title($string)->attr(...$this->attributes)->unfold();
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
