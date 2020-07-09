<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use League\CommonMark\Extension\{
    Table\TableExtension,
    TaskList\TaskListExtension
};

use Eightfold\ShoopExtras\Shoop;

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
        $this->extensions = Shoop::array($extensions)->isNotEmpty(function($result, $array) {
            return ($result->unfold())
                ? Shoop::array($array)
                : Shoop::array([
                    TableExtension::class,
                    TaskListExtension::class
                ]);
        })->noEmpties()->unfold();
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
