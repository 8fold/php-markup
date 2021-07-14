<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

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
        $attr = array_merge(["href {$this->href}"], $this->getAttr());
        return Html::a($this->text)->attr(...$attr)->unfold();
    }
}

