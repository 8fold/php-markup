<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\Html\Elements\HtmlElement;
use Eightfold\Markup\Html;

class Anchor extends HtmlElement
{
    // private $text = '';
    // private $href = '';

    public function __construct(string $text, string $href, ...$args)
    {
        parent::__construct($text, ["href {$href}"]);
    }

    public function unfold(): string
    {
        var_dump($this->args());
        // die(var_dump("href {$this->content()->first}"));
        // $href = Shoop::array($this->args())->first;
        var_dump($this->attrList());
        $attributes = $this->attrList()->plus("href {$this->content()->first}");
        return Html::a($this->main())->attr(...$attributes)->unfold();
    }
}

