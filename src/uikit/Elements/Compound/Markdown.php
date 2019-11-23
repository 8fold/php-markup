<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use League\CommonMark\CommonMarkConverter;

use Eightfold\Shoop\Shoop;

class Markdown extends HtmlElement
{
    private $markdown = '';

    public function __construct(string $markdown)
    {
        $this->markdown = $markdown;
    }

    public function unfold(): string
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        return $converter->convertToHtml($this->markdown);
    }
}
