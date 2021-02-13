<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;

use Eightfold\UIKit\Traits\ExternalStylesAndScripts;

class Head extends HtmlElement
{
    use ExternalStylesAndScripts;

    private $title = 'Page title';

    private $styles = [];
    private $scripts = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function compile(string ...$attributes): string
    {
        $titleAndMeta = [
              Html::title(Component::text($this->title))
        ];

        $styles = [];
        foreach ($this->styles as $styleUrl) {
            $styles[] = Html::link()
                ->attr(
                      'href '. $styleUrl
                    , 'rel stylesheet'
                    , 'type text/css');
        }

        $scripts = [];
        foreach($this->scripts as $script) {
            $scripts[] = Html::script()
                ->attr('src '. $script);
        }


        return Html::head(...array_merge($titleAndMeta, $styles, $scripts))->compile();
    }

    public function styles(string ...$styles)
    {
        $this->styles = $styles;
        return $this;
    }

    public function scripts(string ...$scripts)
    {
        $this->scripts = $scripts;
        return $this;
    }
}
