<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\HtmlElement;

use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;

use Eightfold\Shoop\Apply;

use Eightfold\ShoopShelf\Shoop;

class Markdown extends HtmlElement
{
    private $markdown = "";
    private $config = [];
    private $caseSensitive = true;
    private $markdownReplacements = [];
    private $htmlReplacements = [];
    private $trim = true;
    private $minified = true;
    private $extensions = [];

    public function __construct(string $markdown, array $config = [])
    {
        $this->config = $config;
        $this->markdown = $markdown;
    }

    public function caseSensitive($caseSensitive = true)
    {
        $this->caseSensitive = $caseSensitive;
        return $this;
    }

    public function markdownReplacements($replacements = [])
    {
        $this->markdownReplacements = $replacements;
        return $this;
    }

    public function htmlReplacements($replacements = [])
    {
        $this->htmlReplacements = $replacements;
        return $this;
    }

    public function trim($trim = true)
    {
        $this->trim = $trim;
        return $this;
    }

    public function minified($minified = true)
    {
        $this->minified = $minified;
        return $this;
    }

    public function extensions(...$extensions)
    {
        if (Apply::isEmpty()->unfoldUsing($extensions)) {
            $this->extensions = Shoop::this([
                TableExtension::class,
                TaskListExtension::class
            ]);

        } else {
            $this->extensions = Shoop::this($extensions);

        }
        $this->extensions = $this->extensions->drop(fn($v) => empty($v))->unfold();

        return $this;
    }

    public function prepend(string $markdown)
    {
        $this->markdown = $markdown . $this->markdown;
        return $this;
    }

    public function unfold(): string
    {
        return Shoop::markdown($this->markdown, ...$this->extensions)
            ->html(
                $this->markdownReplacements,
                $this->htmlReplacements,
                $this->caseSensitive,
                $this->minified,
                $this->config
            )->unfold();
    }
}
