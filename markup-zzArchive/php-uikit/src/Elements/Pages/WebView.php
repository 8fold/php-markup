<?php

namespace Eightfold\UIKit\Elements\Pages;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;
// use Eightfold\HtmlComponent\Interfaces\Compile;

// use Eightfold\UIKit\Elements\Simple\Link;
// use Eightfold\UIKit\Compound\NavigationPrimary;

/**
 * pageTitle
 * bodyContent
 *
 *
 */
class WebView extends HtmlElement
{
    protected $pageTitle = 'Page title';
    protected $bodyContent = [];
    private $bodyAttributes = [];
    protected $head = [];
    protected $metaTags = [];
    protected $scripts = [];

    public function __construct(string $pageTitle, ...$bodyContent)
    {
        $this->pageTitle = Html::title(Component::text($pageTitle));
        $this->bodyContent = $bodyContent;
    }

    public function compile(string ...$attributes): string
    {
        $result = Html::html(
              UIKit::head(...array_merge([$this->pageTitle], $this->metaTags))
            , Html::body(...array_merge($this->bodyContent, $this->scripts))->attr(...$this->bodyAttributes)
        )->compile();
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
