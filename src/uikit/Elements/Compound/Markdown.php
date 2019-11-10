<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use League\CommonMark\CommonMarkConverter;

class Markdown
{
    private $markdown = '';

    public function __construct(string $markdown)
    {
        $this->markdown = $markdown;
    }

    public function compile(): string
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        return $converter->convertToHtml($this->markdown);
    }
}
