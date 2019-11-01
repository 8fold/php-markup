<?php

namespace Eightfold\UIKit\Elements\Simple;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

class Anchor
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
        return Html::a($this->text)->attr('href '. $this->target)->unfold();
    }
}

