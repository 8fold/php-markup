<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\UIKit\UIKit;
use Eightfold\Html\Html;
use Eightfold\UIKit\Elements\Simple\Link;

class NavigationSecondary extends HtmlElement
{
    private $links = [];

    public function __construct(Link ...$links)
    {
        $this->links = $links;
    }

    public function compile(string ...$attributes): string
    {
        $list = Html::ul(...$this->processLinks($this->links));

        $nav = Html::nav($list)
            ->is('ef-secondary-nav')
            ->attr(...$this->getAttr());

        return $nav->compile();
    }

    protected function processLinks(array $linksToProcess)
    {
        $links = [];
        foreach ($linksToProcess as $link) {
            list($text, $path) = $link;
            $links[] = Html::li(UIKit::link($text, $path));
        }
        return $links;
    }
}
