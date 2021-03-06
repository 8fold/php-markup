<?php

namespace Eightfold\UIKit\Elements\Simple;

use Eightfold\HtmlComponent\Component;
use Eightfold\HtmlComponent\Interfaces\Compile;

use Eightfold\Html\Html;
use Eightfold\Html\Elements\HtmlElement;

use Eightfold\UIKit\UIKit;

class SimpleList extends HtmlElement
{
    private $items = [];

    private $type = 'unordered';

    private $definitionTerms = [];

    public function __construct(Compile ...$items)
    {
        $this->items = $items;
    }

    public function compile(string ...$attributes): string
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
        return Html::$container(...$listItems)
            ->compile(...array_merge($this->getAttr(), $attributes));
    }

    public function ordered(): SimpleList
    {
        $this->type = 'ordered';
        return $this;
    }

    public function definition(int ...$terms): SimpleList
    {
        $this->type = 'definition';
        $this->definitionTerms = $terms;
        return $this;
    }

    private function listItems(array $content)
    {
        $count = 0;
        $listItems = [];
        foreach ($content as $index => $item) {
            if (is_string($item)) {
                $item = Component::text($item);
            }

            if ($this->type == 'unordered' || $this->type == 'ordered') {
                $listItems[] = Html::li($item);

            } else {
                $count = $count + 1;

                if (count($this->definitionTerms) == 0) {
                    if ($count % 2 == 0) {
                        $items = Html::dd($item);

                    } else {
                        $items = Html::dt($item);

                    }

                } elseif (in_array($index + 1, $this->definitionTerms)) {
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
