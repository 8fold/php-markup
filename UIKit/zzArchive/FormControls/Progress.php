<?php

namespace Eightfold\Markup\UIKit\Elements\FormControls;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;
use Eightfold\UIKit\Elements\Simple\Link;

/**
 *
 * UIKit::ef_progress(value, min = 0, max = 100)
 *     ->meter(low = 25, high = 50, optimum = 75)
 *     ->range(step = 1)
 *     ->labels('label1', 'label2', label3)
 *     ->links(Link1, Link2, Link3)
 *
 */
class Progress extends HtmlElement
{
    private $_type = 'progress'; // meter, range

    private $value = 0;
    private $min = 0;
    private $max = 100;

    private $_step = 1;

    private $_low = 25;
    private $_high = 50;
    private $_optimum = 75;

    private $_labels = [];
    private $_links = [];

    public function __construct(float $value, float $min = 0, float $max = 100)
    {
        $this->value = $value;
        $this->min = $min;
        $this->max = $max;
    }

    public function compile(string ...$attributes): string
    {
        $labels = [];
        if (count($this->_labels) > 0) {
            $labels = array_map(function ($content) {
                return (is_null($content))
                    ? Html::div()
                    : Html::div(Html::p($content));
            }, $this->_labels);
        }

        $links = [];
        if (count($this->_links) > 0) {
            $links = array_map(function (?Link $link) {
                return (is_null($link))
                    ? Html::div()
                    : Html::div(Html::p($link));
            }, $this->_links);
        }

        // TODO: Probably promote this to a superclass; probably more accurately
        //       put all the other stuff in a sub-class of this one.
        return Html::div(...array_merge(
              $labels
            , [Html::progress()->attr('value '. $this->value, 'max '. $this->max)]
            , $links
        ))->is('ef-progress')->compile(...array_merge($this->getAttr(), $attributes));
    }

    public function step(float $step = 1): Progress
    {
        $this->_type = 'range';
        $this->_step = $step;
        return $this;
    }

    public function meter(
        float $optimum = 75,
        float $low = 25,
        float $high = 75): Progress
    {
        $this->_type = 'meter';
        $this->_optimum = $optimum;
        $this->_low = $low;
        $this->_high = $high;
        return $this;
    }

    public function labels(string ...$labels): Progress
    {
        foreach ($labels as $text) {
            $this->_labels[] = Component::text($text);
        }
        return $this;
    }

    public function links(array ...$links): Progress
    {
        foreach ($links as $config) {
            list($text, $target) = $config;
            $this->_links[] = UIKit::link($text, $target);
        }
        return $this;
    }
}
