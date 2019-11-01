<?php

namespace Eightfold\UIKit\Elements\Simple;

// use Eightfold\HtmlComponent\Component;
// use Eightfold\HtmlComponent\Interfaces\Compile;

use Eightfold\Html\Html;
use Eightfold\Html\Elements\HtmlElement;

use Eightfold\UIKit\UIKit;

class SimpleList
{
    private $items = [];

    private $type = 'unordered';

    private $descriptionTerms = [];

    public function __construct(...$items)
    {
        $this->items = $items;
    }

    public function unfold(): string
    {
        if (count($this->items) == 0) {
            return '';
        }

        $listItems = $this->listItems($this->items);

        $container = 'ul';
        if ($this->type == 'ordered') {
            $container = 'ol';

        } elseif ($this->type == 'definition') {
            $container = 'dl';

        }
        return Html::$container(...$listItems)->unfold();
    }

    public function ordered(): SimpleList
    {
        $this->type = 'ordered';
        return $this;
    }

    /**
     * @deprecate
     */
    public function definition(int ...$terms): SimpleList
    {
        return $this->description(...$terms);
    }

    public function description(int ...$terms): SimpleList
    {
        $this->type = 'definition';
        $this->descriptionTerms = $terms;
        return $this;
    }

    private function listItems(array $content)
    {
        $count = 0;
        $listItems = [];
        foreach ($content as $index => $item) {
            // if (is_string($item)) {
            //     $item = Component::text($item);
            // }

            if ($this->type == 'unordered' || $this->type == 'ordered') {
                $listItems[] = Html::li($item);

            } else {
                $count = $count + 1;

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
