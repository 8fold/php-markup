<?php

namespace Eightfold\UIKit\Elements\Simple;

use Eightfold\Html\Html;
use Eightfold\Html\Elements\HtmlElement;

/**
 * Glyph
 *
 * The glyph component is meant to deliver simple imagery via the Font Awesome set.
 *
 * Require key
 *
 * - **type:** The name of the Font Awesome glyph to use, without the `fa-` prefix.
 *
 * UIKit::glyph('type')
 */
class Glyph extends HtmlElement
{
    private $iconClass = '';

    public function __construct(string $iconClass)
    {
        $this->iconClass = $iconClass;
    }

    public function compile(string ...$attributes): string
    {
        return Html::i()->compile(
            'class fa fa-'. $this->iconClass,
            'aria-hidden true'
        );
    }
}
