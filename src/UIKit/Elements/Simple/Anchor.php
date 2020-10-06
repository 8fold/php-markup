<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Html\HtmlElement;
use Eightfold\Markup\Html;

class Anchor extends HtmlElement
{
    public function __construct(string $text, string $href)
    {
        parent::__construct($text, ["href {$href}"]);
    }

    public function unfold(): string
    {
        return Html::a($this->main)->attr(...$this->attributes)->unfold();
    }
}

