<?php

namespace Eightfold\UIKit\Elements\Simple;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\Html\Elements\HtmlElement;
use Eightfold\Html\Elements\Tabular\Caption;

/**
 * Simple table
 *
 * The table element is one of those elements that is deceptively simple&hellip;
 * because it's really not.
 *
 * Tables can have column groups to allow styling an entire column a certain way. A
 * caption, or not. A set of header rows, or not. A footer, or not. Multiple body tags,
 * or not. And all of those tags can have attributes like crazy.
 *
 * But, for the most part, from what we've seen around the Internet, developed for
 * ourselves and others, and so on, all we really need is a very, *very* simple table.
 * A bunch of rows with cells. Maybe a header row or more.
 *
 * That's what the simple table does.
 *
 * One body with a bunch of rows, each with a bunch of cells. An optional header row to
 * make column headings. Done.
 *
 * Required key
 *
 * - **rows:** An array of arrays containing strings respresenting the data for each
 *   column.
 *
 * Optional key
 *
 * - **headers:** An array of strings containing the title for each column.
 *
 * ef_simple_table([rows])->headers()
 * @example
 *
 * [
 *     {
 *         "headers": [
 *             "Header 1",
 *             "Header 2"
 *         ],
 *         "rows": [
 *             [
 *                 "Cell 1",
 *                 "Cell 2"
 *             ]
 *         ]
 *     }
 * ]
 */
class SimpleTable extends HtmlElement
{
    private $_bordered = true;

    private $_caption = '';

    private $_headers = [];

    private $_rows = [];

    public function __construct(array ...$rows)
    {
        $this->_rows = $rows;
    }

    public function compile(string ...$attributes): string
    {
        if (count($this->_rows) == 0) {
            return '';
        }

        $caption = $this->getCaption();

        $thead = $this->getHead();

        $tbody = $this->getBody();

        $return = null;
        if (strlen($this->_caption) == 0) {
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
        return $return->compile();
    }

    public function caption(string $caption): SimpleTable
    {
        $this->_caption = $caption;
        return $this;
    }

    public function headers(string ...$headers): SimpleTable
    {
        $this->_headers = $headers;
        return $this;
    }

    public function borderless(bool $borderless = false): SimpleTable
    {
        if ($borderless) {
            $this->_bordered = false;
        }
        return $this;
    }

    private function getCaption()
    {
        $caption = Component::text('');
        if (strlen($this->_caption) > 0) {
            $caption = Html::caption(Component::text($this->_caption));

        }
        return $caption;
    }

    private function getHead()
    {
        $thead = '';
        if (count($this->_headers) > 0) {
            $headerCells = [];
            foreach ($this->_headers as $header) {
                $headerCells[] = Html::th(Component::text($header));

            }
            $thead = Html::thead(Html::tr(...$headerCells));
        }
        return $thead;
    }

    private function getBody()
    {
        $rows = [];
        foreach ($this->_rows as $row) {
            $rowCells = [];
            foreach ($row as $cell) {
                if (is_string($cell)) {
                    $rowCells[] = Html::td(Component::text($cell));

                } else {
                    $rowCells[] = Html::td($cell);

                }
            }
            $rows[] = Html::tr(...$rowCells);
        }
        return Html::tbody(...$rows);
    }
}
