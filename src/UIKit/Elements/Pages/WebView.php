<?php

namespace Eightfold\Markup\UIKit\Elements\Pages;

use Eightfold\Markup\Html\HtmlElement;

// use Eightfold\UIKit\Elements\HtmlElementBridge;

use Eightfold\Shoop\Shoop;
use Eightfold\Markup\UIKit;
use Eightfold\HtmlComponent\Interfaces\Compile;

class WebView extends HtmlElement
{
    protected $pageTitle = 'Page title';

    protected $meta = [];

    private $bodyAttributes = [];

    protected $scripts = [];

    public function __construct(string $pageTitle, ...$content)
    {
        $this->pageTitle = UIKit::title($pageTitle);
        $this->content = $content;
    }

    public function unfold(string ...$attributes): string
    {
        $head = Shoop::array([$this->pageTitle])->plus(...$this->meta);
        $result = UIKit::html(
            UIKit::head(...$head->unfold()),
            UIKit::body(...$this->content)->attr(...$this->bodyAttributes)
        );
        return $result->unfold(...$attributes);
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
