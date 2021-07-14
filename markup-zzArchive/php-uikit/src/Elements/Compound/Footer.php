<?php

namespace Eightfold\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\Elements\Simple\Link;

class Footer extends HtmlElement
{
    private $holder = '';
    private $year = 0;

    private $links = [];
    private $scripts = [];
    private $scriptCalls = [];

    public function __construct(string $holder, int $year, Link ...$links)
    {
        $this->holder = $holder;
        $this->year = $year;
        $this->links = $links;
    }

    public function compile(string ...$attributes): string
    {
        $holder = $this->holder;

        $yearRange = $this->year .'&ndash;'. date('Y');

        $content = Html::p(Component::text('© '. $yearRange .' '. $holder .'. All rights reserved.'));

        $links = $this->linkList(...$this->links);

        $scripts = [];
        foreach ($this->scripts as $script) {
            $scripts[] = Html::script()->attr('src '. $script);
        }

        return Html::footer(...array_merge(
              [$links]
            , [$content]
            , $scripts
        ))->compile();
    }

    public function scripts(string ...$scripts)
    {
        $this->_scripts = $scripts;
        return $this;
    }

    public function scriptCalls(string ...$scriptCalls)
    {
        $this->_scriptCalls = $scriptCalls;
        return $this;
    }

    private function linkList(Link ...$links)
    {
        $content = Component::text('');
        if (count($links) > 0) {
            $items = [];
            foreach ($links as $link) {
                $items[] = Html::li($link);
            }

            if (count($items) > 0) {
                $content = Html::nav(Html::ul(...$items));
            }
        }
        return $content;
    }
}
