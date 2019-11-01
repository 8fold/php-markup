<?php

namespace Eightfold\UIKit\Elements\Pages;

use Eightfold\UIKit\Elements\HtmlElementBridge;

use Eightfold\Shoop\Shoop;
use Eightfold\UIKit\UIKit;
use Eightfold\HtmlComponent\Interfaces\Compile;

// use Eightfold\UIKit\Elements\Simple\Link;
// use Eightfold\UIKit\Compound\NavigationPrimary;

class WebView
{
    protected $pageTitle = 'Page title';

    protected $bodyContent = [];

    private $bodyAttributes = [];

    protected $head = [];

    protected $metaTags = [];

    protected $scripts = [];

    public function __construct(string $pageTitle, ...$bodyContent)
    {
        $this->pageTitle = UIKit::title(UIKit::text($pageTitle));
        $this->bodyContent = $bodyContent;
    }

    public function unfold(): string
    {
        $result = UIKit::html(
            UIKit::head(...array_merge([$this->pageTitle], $this->metaTags)),
            UIKit::body(...array_merge($this->bodyContent, $this->scripts))
        )->unfold();

        return $result;
    }

    /**
     * TODO: Rename
     *
     * @param  [type] $metaTags [description]
     * @return [type]           [description]
     */
    public function headMeta(...$metaTags)
    {
        $this->metaTags = $metaTags;
        return $this;
    }

    public function bodyScripts(...$scripts)
    {
        $this->scripts = $scripts;
        return $this;
    }

    public function bodyAttr(string ...$attributes)
    {
        $this->bodyAttributes = $attributes;
        return $this;
    }
}
