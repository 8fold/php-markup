<?php

namespace Eightfold\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\HtmlComponent\Interfaces\Compile;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\Elements\Simple\Link;

use Eightfold\UIKit\Traits\PrimaryAndSecondaryNav;

class Header extends HtmlElement
{
    private $buttonLabel = 'show menu';
    private $links = [];

    public function __construct(string $buttonLabel, Compile ...$links)
    {
        $this->buttonLabel = $buttonLabel;
        $this->links = $links;
    }

    public function compile(string ...$attributes): string
    {
        return Html::header(
            Html::nav(
                  Html::button(
                    Component::text($this->buttonLabel)
                )->is('ef-button')->attr('class collapsable')
                , $this->linkList($this->links)
            )
        )->compile();
    }

    private function linkList(array $links) {
        $listItems = [];
        foreach ($links as $link) {
            $listItems[] = Html::li($link);
        }

        return Html::ul(...$listItems)->attr('class collapsed');
    }
}
