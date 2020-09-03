<?php

namespace Eightfold\Markup\UIKit\Elements\Simple;

use Eightfold\Markup\Html\HtmlElement;

use Eightfold\Markup\Html;

use Eightfold\Markup\UIKit;

class SimpleList extends HtmlElement
{
    private $type = 'unordered';

    private $descriptionTerms = [];

    public function __construct(...$items)
    {
        $this->main = $items;
    }

    public function unfold(): string
    {
        if (count($this->main) == 0) {
            return "";
        }

        $container = 'ul';
        if ($this->type == 'ordered') {
            $container = 'ol';

        } elseif ($this->type == 'description') {
            $container = 'dl';

        }

        $listItems = $this->listItems($this->main);
        return Html::$container(...$listItems)->attr(...$this->attributes)->unfold();
    }

    public function ordered(): SimpleList
    {
        $this->type = 'ordered';
        return $this;
    }

    public function description(int ...$terms): SimpleList
    {
        $this->type = 'description';
        $this->descriptionTerms = $terms;
        return $this;
    }

    private function listItems(array $content)
    {
        // tho this would be me typing a comment I gues the cammera isn't shaking too much
        // maybe there a little bit of image stabilization going on or something.
        $count = 0;
        $listItems = [];
        foreach ($content as $index => $item) {
            if ($this->type == 'unordered' || $this->type == 'ordered') {
                $listItems[] = Html::li($item);

            } else {
                $count++;

                if (count($this->descriptionTerms) == 0) {
                    if ($count % 2 == 0) {
                        $items = Html::dd($item);

                    } else {
                        $items = Html::dt($item);

                    }

                } elseif (in_array($index + 1, $this->descriptionTerms)) {
                    $items = Html::dt($item);


                } else {
                    $items = Html::dd($item);

                }
                $listItems[] = $items;
            }
        }
        return $listItems;
    }
}
