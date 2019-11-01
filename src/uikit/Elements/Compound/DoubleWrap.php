<?php

namespace Eightfold\UIKit\Elements\Compound;

use Eightfold\Html\Html;
// use Eightfold\UIKit\Elements\HtmlElementBridge;

// use Eightfold\Html\Elements\HtmlElement;

// use Illuminate\Support\Facades\Session;

use Eightfold\UIKit\UIKit;

use Eightfold\UIKit\Traits\Classable;

// use Eightfold\LaravelUIKit\Traits\EightfoldProperties;

class DoubleWrap
{
    use Classable;
    // use EightfoldProperties;

    private $content = [];

    private $outerElement = "div";

    private $outerAttr = [];

    private $innerElement = "div";

    private $innerAttr = [];

    public function __construct($args)
    {
        $this->content = $args;
    }

    public function outer(string $outer, string ...$outerAttr): DoubleWrap
    {
        $this->outerElement = $outer;
        $this->outerAttr = $outerAttr;
        return $this;
    }

    public function inner(string $inner, string ...$innerAttr): DoubleWrap
    {
        $this->innerElement = $inner;
        $this->innerAttr = $innerAttr;
        return $this;
    }

    public function unfold(): string
    {
        return Html::div(Html::div($this->content));
        return UIKit::{$this->outerElement}(
            UIKit::{$this->innerElement}(
                $this->content
            )->attr(...$this->innerAttr)
        )->attr(...$this->outerAttr)->unfold();
    }
}
