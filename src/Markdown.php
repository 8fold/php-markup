<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use League\CommonMark\Extension\ExtensionInterface;

// use Eightfold\Markup\Html\HtmlElement;

// use Eightfold\ShoopShelf\Shoop;

class Markdown //extends HtmlElement
{
    private string $markdown = '';

    /**
     * @var array<mixed>
     */
    private array $config = [];

    private bool $caseSensitive = true;

    /**
     * @var array<string>
     */
    private array $markdownReplacements = [];

    /**
     * @var array<string>
     */
    private $htmlReplacements = [];

    private bool $trim = true;

    private bool $minified = true;

    /**
     * @var array<ExtensionInterface>
     */
    private $extensions = [];

    /**
     * @param array<mixed> $config [description]
     */
    public function __construct(string $markdown, array $config = [])
    {
        $this->config = $config;
        $this->markdown = $markdown;
    }

    public function caseSensitive(bool $caseSensitive = true): Markdown
    {
        $this->caseSensitive = $caseSensitive;

        return $this;
    }

    /**
     * @param  array<string> $replacements [description]
     */
    public function markdownReplacements($replacements = []): Markdown
    {
        $this->markdownReplacements = $replacements;

        return $this;
    }

    /**
     * @param  array<string> $replacements [description]
     */
    public function htmlReplacements($replacements = []): Markdown
    {
        $this->htmlReplacements = $replacements;

        return $this;
    }

    public function trim(bool $trim = true): Markdown
    {
        $this->trim = $trim;

        return $this;
    }

    public function minified(bool $minified = true): Markdown
    {
        $this->minified = $minified;

        return $this;
    }

    /**
     * @param  ExtensionInterface $extensions [description]
     */
    public function extensions(...$extensions): Markdown
    {
        // $this->extensions = Shoop::this($extensions)
        //     ->drop(fn($v) => empty($v))->unfold();

        return $this;
    }

    public function prepend(string $markdown): Markdown
    {
        $this->markdown = $markdown . $this->markdown;

        return $this;
    }

    public function meta(): object
    {
        return (object) [];
        // return Shoop::markdown($this->markdown)->meta();
    }

    public function build(): string
    {
        return '';
        // return Shoop::markdown($this->markdown, ...$this->extensions)
        //     ->html(
        //         $this->markdownReplacements,
        //         $this->htmlReplacements,
        //         $this->caseSensitive,
        //         $this->minified,
        //         $this->config
        //     )->unfold();
    }
}
