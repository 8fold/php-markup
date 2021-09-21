<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Markup\Html\HtmlElement;

use Eightfold\Markup\Html;

use Eightfold\Markup\UIKit;

class PageTitle extends HtmlElement
{
    private $separater = " | ";

    private $reversed = false;

    public function __construct(array $titleParts, string $separater = " | ")
    {
        $this->main = $titleParts;

        $this->separater = $separater;
    }

    public function unfold(): string
    {
        if (count($this->main) === 0) {
            return "";
        }

        if ($this->reversed) {
            $this->main = array_reverse($this->main);
        }

        $string = implode($this->separater, $this->main);

        return Html::title($string)->attr(...$this->attributes)->unfold();
    }

    public function reversed(): PageTitle
    {
        $this->reversed = true;
        return $this;
    }
}
