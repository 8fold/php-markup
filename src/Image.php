<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\HTMLBuilder\Element as HtmlElement;

// use Eightfold\Markup\Html\HtmlElement;

// use Eightfold\Markup\Html;

class Image //extends HtmlElement
{
    private string $alt = '';

    private string $src = '';

    public function __construct(string $alt, string $src)
    {
        $this->$alt = $alt;
        $this->$src = $src;
    }

    public function build(): string
    {
        return '';
        // return Html::img()->attr(...$this->attributes)->unfold();
    }
}
