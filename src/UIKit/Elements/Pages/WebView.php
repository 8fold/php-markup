<?php

namespace Eightfold\Markup\UIKit\Elements\Pages;

use Eightfold\Markup\Html\HtmlElement;

use Eightfold\Shoop\Shoop;

use Eightfold\Markup\UIKit;

class WebView extends HtmlElement
{
    protected $title = "Page title";

    protected $meta = [];

    private $bodyAttributes = [];

    protected $scripts = [];

    public function __construct(string $title, ...$content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public function unfold(): string
    {
        $string = UIKit::html(
            UIKit::head(...Shoop::this([
                    UIKit::title($this->title)
                ])->plus($this->meta)
            ),
            UIKit::body(...$this->content)->attr(...$this->bodyAttributes)
        )->unfold();

        return "<!doctype html>". $string;
    }

    public function meta(...$meta)
    {
        $this->meta = $meta;
        return $this;
    }

    public function bodyAttr(string ...$attributes)
    {
        $this->bodyAttributes = $attributes;
        return $this;
    }
}
