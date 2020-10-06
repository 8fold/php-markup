<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Markup\Html\HtmlElement;

use Eightfold\Markup\Html;

class Image extends HtmlElement
{
    public function __construct(string $alt, string $src)
    {
        $this->attr("alt {$alt}", "src {$src}");
    }

    public function unfold(): string
    {
        return Html::img()->attr(...$this->attributes)->unfold();
    }
}
