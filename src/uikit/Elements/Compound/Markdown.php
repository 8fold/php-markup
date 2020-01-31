<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use League\CommonMark\CommonMarkConverter;

use Eightfold\Shoop\Shoop;

class Markdown extends HtmlElement
{
    private $markdown = '';

    private $config = [
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
    ];

    public function __construct(string $markdown, array $config = [])
    {
        if (count($config) > 0) {
            $this->config = $config;
        }
        $this->markdown = $markdown;
    }

    public function unfold(): string
    {
        $converter = new CommonMarkConverter($this->config);
        return $converter->convertToHtml($this->markdown);
    }
}
