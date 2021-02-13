<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Html\Html;
use Eightfold\Html\Elements\HtmlElement;

class UserCard extends HtmlElement
{
    public function compile(string ...$attributes): string
    {
        $alt = $this->_content[0];
        $src = $this->_content[1];

        return Html::figure(
            Html::img()->attr('alt '. $alt->compile(), 'src '. $src->compile())
        )->is('ef-user-card')->attr('class ef-radial-figure')->compile();
    }
}
