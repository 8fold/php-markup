<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Markup\Html\Elements\HtmlElement;

use Eightfold\Markup\Html;

class Image extends HtmlElement
{
    private $src = "";

    private $alt = "";

    private $schemaProp = "";

    public function __construct(string $altText, string $path)
    {
        // TODO: Rename to src and alt for consistency
        $this->alt = $altText;
        $this->src = $path;
    }

    public function schemaProp(string $property): Image
    {
        $this->schemaProp = $property;
        return $this;
    }

    public function unfold(): string
    {
        $attr = $this->getAttr()->plus(
            "src ". $this->src,
            "alt ". $this->alt
        );
        return Html::img()->attr(...$attr)->unfold();
    }
}
