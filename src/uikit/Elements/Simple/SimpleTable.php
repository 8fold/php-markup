<?php

namespace Eightfold\UIKit\Elements\Simple;

// use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\Tabular\Caption;

class SimpleTable
{
    private $bordered = true;

    private $caption = '';

    private $headers = [];

    private $rows = [];

    public function __construct(array ...$rows)
    {
        $this->rows = $rows;
    }

    public function unfold(): string
    {
        if (count($this->rows) == 0) {
            return '';
        }

        $caption = $this->getCaption();

        $thead = $this->getHead();

        $tbody = $this->getBody();

        $return = null;
        if (strlen($this->caption) == 0) {
            $return = Html::table(
                    $thead,
                    $tbody
                );

        } else {
            $return = Html::table(
                    $caption,
                    $thead,
                    $tbody
                );
        }
        return $return->unfold();
    }

    public function caption(string $caption): SimpleTable
    {
        $this->caption = $caption;
        return $this;
    }

    public function headers(string ...$headers): SimpleTable
    {
        $this->headers = $headers;
        return $this;
    }

    public function borderless(bool $borderless = false): SimpleTable
    {
        if ($borderless) {
            $this->bordered = false;
        }
        return $this;
    }

    private function getCaption()
    {
        $caption = '';
        if (strlen($this->caption) > 0) {
            $caption = Html::caption($this->caption);

        }
        return $caption;
    }

    private function getHead()
    {
        $thead = '';
        if (count($this->headers) > 0) {
            $headerCells = [];
            foreach ($this->headers as $header) {
                $headerCells[] = Html::th($header);

            }
            $thead = Html::thead(Html::tr(...$headerCells));
        }
        return $thead;
    }

    private function getBody()
    {
        $rows = [];
        foreach ($this->rows as $row) {
            $rowCells = [];
            foreach ($row as $cell) {
                if (is_string($cell)) {
                    $rowCells[] = Html::td($cell);

                } else {
                    $rowCells[] = Html::td($cell);

                }
            }
            $rows[] = Html::tr(...$rowCells);
        }
        return Html::tbody(...$rows);
    }
}
