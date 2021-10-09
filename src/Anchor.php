<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

class Anchor
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
