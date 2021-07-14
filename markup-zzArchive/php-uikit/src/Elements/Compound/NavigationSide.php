<?php

namespace Eightfold\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\Elements\Simple\Link;

class NavigationSide extends HtmlElement
{
    private $links = [];

    public function __construct(Link ...$links)
    {
        $this->links = $links;
    }

    public function compile(string ...$attributes): string
    {
        $list = Html::ul(...$this->processLinks($this->links))->attr('class collapsed');

        $nav = Html::aside(
              Html::button(Component::text('user menu'))->attr('class collapsable')
            , $list
            )->is('ef-side-navigation')
            ->attr(...$this->getAttr());
        return $nav->compile();
    }

    protected function processLinks(array $linksToProcess)
    {
        $links = [];
        foreach ($linksToProcess as $link) {
            $links[] = Html::li($link);
        }
        return $links;
    }
}

