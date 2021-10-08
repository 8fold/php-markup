<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\HTMLBuilder\Element as HtmlElement;

// use Eightfold\Markup\Html\HtmlElement;

// use Eightfold\Markup\Html;

// use Eightfold\Markup\UIKit;

class SimpleList //extends HtmlElement
{
    /**
     * @var array<HtmlElement|string>
     */
    private array $items = [];

    private string $type = 'unordered';

    /**
     * @var array<HtmlElement|string>
     */
    private array $descriptionTerms = [];

    /**
     * @param HtmlElement|string $items [description]
     */
    public function __construct(...$items)
    {
        $this->items = $items;
    }

    public function build(): string
    {
        return '';
    }

    public function ordered(): SimpleList
    {
        $this->type = 'ordered';
        return $this;
    }

    /**
     * @param HtmlElement|string $terms [description]
     */
    public function description(...$terms): SimpleList
    {
        $this->type = 'description';
        $this->descriptionTerms = $terms;
        return $this;
    }

    /**
     * @param  array<HtmlElement|string>  $content [description]
     * @return array<HtmlElement|string>  [description]
     */
    private function listItems(array $content): array
    {
        return [];
        // $count = 0;
        // $listItems = [];
        // foreach ($content as $index => $item) {
        //     if ($this->type == 'unordered' || $this->type == 'ordered') {
        //         $listItems[] = Html::li($item);

        //     } else {
        //         $count++;

        //         if (count($this->descriptionTerms) == 0) {
        //             if ($count % 2 == 0) {
        //                 $items = Html::dd($item);

        //             } else {
        //                 $items = Html::dt($item);

        //             }

        //         } elseif (in_array($index + 1, $this->descriptionTerms)) {
        //             $items = Html::dt($item);


        //         } else {
        //             $items = Html::dd($item);

        //         }
        //         $listItems[] = $items;
        //     }
        // }
        // return $listItems;
    }
}
