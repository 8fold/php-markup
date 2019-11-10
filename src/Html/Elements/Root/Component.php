<?php

namespace Eightfold\Markup\Html\Elements\Root;

use Eightfold\HtmlComponent\Component as BaseComponent;
use Eightfold\Markup\Html\Elements\HtmlElementBuilder;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Content;



/**
 * @version 1.0.0
 *
 * Component
 *
 */
class Component extends BaseComponent
{
    static public function build(array $config = []): string
    {
        HtmlElementBuilder::orderAttributes($config);
        return parent::build($config);
    }
}

