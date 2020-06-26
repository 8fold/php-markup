<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\Markup\Html\Elements\HtmlElement;

use Eightfold\Shoop\Helpers\Type;
use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\ESInt;
use Eightfold\Shoop\ESString;
use Eightfold\Shoop\ESBool;

use Eightfold\Markup\UIKit;

class Pagination extends HtmlElement
{
    private $currentPage;
    private $itemTotal;
    private $linkPrefix;
    private $itemLimit;
    private $pageLimit;

    public function __construct($currentPage, $itemTotal, $linkPrefix = "/feed/page", $itemLimit = 10, $pageLimit = 7)
    {
        $this->currentPage = Type::sanitizeType($currentPage, ESInt::class);
        $this->itemTotal = Type::sanitizeType($itemTotal, ESInt::class);
        $this->linkPrefix = Type::sanitizeType($linkPrefix, ESString::class);
        $this->itemLimit = Type::sanitizeType($itemLimit, ESInt::class);
        $this->pageLimit = Type::sanitizeType($pageLimit, ESInt::class);
    }

    public function pageCount(): ESInt
    {
        return Shoop::int($this->itemTotal)->roundUp($this->itemLimit);
    }

    public function hasHiddenPages(): ESBool
    {
        return $this->pageCount()->isGreaterThan($this->pageLimit);
    }

    public function unfold(): string
    {
        if ($this->pageCount()->isUnfolded(1)) {
            return "";

        }

        if ($this->hasHiddenPages()->unfold()) {
            $start = 0;
            $end = 0;
            $links = Shoop::array([
                $this->anchorFor($this->currentPage->plus(1)),
                $this->anchorFor($this->currentPage->minus(1)),
                $this->anchorFor(1)

            ])->plus(...
                $this->pageCount()->minus(2)->roundDown(2)
                ->isOdd(function($result, $int) use (&$start, &$end) {
                    $midCount = ($result) ? $int : $int->plus(1);
                    $endCapCount = $midCount->roundDown(2);
                    $start = $this->currentPage->minus($endCapCount);
                    $end = $this->currentPage->plus($endCapCount);
                    return Shoop::int($start)->range($end);

                })->each(function($pageNumber) {
                    return $this->anchorFor($pageNumber);

                })
            )->plus(
                $this->anchorFor($this->pageCount())

            );
            $class = "has-hidden-pages";
            if ($start->minus(1)->is(1)->unfold() and $end->plus(1)->isNot($this->pageCount())->unfold()) {
                $class = "has-hidden-pages-next";

            } elseif ($start->minus(1)->isNot(1)->unfold() and $end->plus(1)->is($this->pageCount())->unfold()) {
                $class = "has-hidden-pages-previous";

            }
            return UIKit::nav(UIKit::listWith(...$links))
                ->attr("class {$class}", "aria-label Pagination navigation", "role navigation");

        } else {
            $links = $this->pageCount()->range(1)->each(function($pageNumber) {
                return $this->anchorFor($pageNumber);
            });

        }
        return UIKit::nav(UIKit::listWith(...$links))
            ->attr("aria-label Pagination navigation", "role navigation");
    }

    private function anchorFor($pageNumber)
    {
        $pageNumber = Type::sanitizeType($pageNumber, ESInt::class)->unfold();
        $link = UIKit::anchor(
            $pageNumber,
            $this->linkPrefix->plus("/{$pageNumber}")
        )->attr("aria-label Goto page {$pageNumber}");
        if ($this->currentPage->isUnfolded($pageNumber)) {
            $link = $link->attr(
                "aria-label Current page, page {$pageNumber}",
                "aria-current true",
                "class current"
            );
        }
        return $link;
    }
}
