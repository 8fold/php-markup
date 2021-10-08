<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\HTMLBuilder\Element as HtmlElement;

// use Eightfold\Shoop\Shoop;

// use Eightfold\Markup\Html\HtmlElement;
// use Eightfold\Markup\Html;

class Anchor //extends HtmlElement
{
    private string $text = '';

    private string $href = '';

    public function __construct(string $text, string $href)
    {
        $this->text = $text;

        $this->href = $href;
        // parent::__construct($text, ["href {$href}"]);
    }

    public function build(): string
    {
        return '';
        // return Html::a($this->main)->attr(...$this->attributes)->unfold();
    }
}

