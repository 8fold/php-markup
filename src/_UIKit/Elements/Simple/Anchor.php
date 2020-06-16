<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html;

class Anchor extends HtmlElement
{
    private $text = '';
    private $href = '';

    public function __construct(string $text, string $href)
    {
        $this->text = $text;
        $this->href = $href;
    }

    public function unfold(): string
    {
        $attributes = $this->attributes()->plus("href {$this->href}");
        return Html::a($this->text)->attr(...$attributes)->unfold();
    }
}

