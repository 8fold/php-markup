<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html;

class Anchor extends HtmlElement
{
    private $text = '';
    private $target = '';

    private $_current = false;
    private $_glyph = '';

    public function __construct(string $text, string $target)
    {
        $this->text = $text;
        $this->target = $target;
    }

    public function unfold(): string
    {
        $attr = array_merge(["href {$this->target}"], $this->getAttr());
        return Html::a($this->text)->attr(...$attr)->unfold();
    }
}

