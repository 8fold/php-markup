<?php

namespace Eightfold\UIKit\Elements\Simple;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

class Link extends HtmlElement
{
    private $text = '';
    private $target = '';

    private $_current = false;
    private $_glyph = '';

    public function __construct(string $text, string $target)
    {
        $this->text = Component::text($text);
        $this->target = $target;
    }

    public function compile(string ...$attributes): string
    {
        if (count($attributes) > 0) {
            $this->attr(...$attributes);
        }

        $this->attr('href '. $this->target);

        return Html::a($this->text)
            ->compile(...$this->getAttr());
    }
}

