<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use Eightfold\Markup\Html;
use Eightfold\Markup\UIKit;

class DoubleWrap extends HtmlElement
{
    private $outerElement = "div";

    private $outerAttr = [];

    private $innerElement = "div";

    private $innerAttr = [];

    public function __construct(...$content)
    {
        $this->content = $content;
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
        return UIKit::{$this->outerElement}(
            UIKit::{$this->innerElement}(
                ...$this->content
            )->attr(...$this->innerAttr)
        )->attr(...$this->outerAttr)->unfold();
    }
}
