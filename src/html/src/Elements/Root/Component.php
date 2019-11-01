<?php

namespace Eightfold\Html\Elements\Root;

use Eightfold\HtmlComponent\Component as BaseComponent;
use Eightfold\Html\Elements\HtmlElementBuilder;

use Eightfold\Html\Data\Elements;

use Eightfold\Html\Data\Attributes\Content;



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

