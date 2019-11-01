<?php

namespace Eightfold\UIKit\Elements\Simple;

use Eightfold\Html\Html;
use Eightfold\Html\Elements\HtmlElement;

use Eightfold\UIKit\Traits\Classable;

class Image extends HtmlElement
{
    use Classable;

    private $src = "";

    private $alt = "";

    private $schemaProp = "";

    private $classProperties = "";

    public function __construct(...$args)
    {
        $this->alt = $args[0];
        $this->src = $args[1];
    }

    public function schemaProp(string $property): Image
    {
        $this->schemaProp = $property;
        return $this;
    }

    public function class(string ...$properties): Image
    {
        $this->classProperties = implode(" ", $properties);
        return $this;
    }

    public function compile(string ...$attributes): string
    {
        $attr = array_merge(
            $this->getAttr(),
            ["src ". $this->src],
            ["alt ". $this->alt],
            (strlen($this->classProperties) > 0)
                ? ["class ". $this->classProperties]
                : [],
            $attributes
        );
        return Html::img()->compile(...$attr);
    }
}
