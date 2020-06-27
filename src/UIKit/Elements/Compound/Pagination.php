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
    private $totalItems;
    private $linkPrefix;
    private $totalItemsPerPage;
    private $middleLimit;

    public function __construct(
        $currentPage,
        $totalItems,
        $linkPrefix = "/feed/page",
        $totalItemsPerPage = 10,
        $middleLimit = 5
    )
    {
        $this->totalItems = Type::sanitizeType($totalItems, ESInt::class);
        $this->totalItemsPerPage = Type::sanitizeType($totalItemsPerPage, ESInt::class);
        $this->middleLimit = Type::sanitizeType($middleLimit, ESInt::class)
            ->isOdd(function($result, $int) {
                return ($result) ? $int : $int->plus(1);
            });

        $this->currentPage = Type::sanitizeType($currentPage, ESInt::class);

        $this->linkPrefix = Type::sanitizeType($linkPrefix, ESString::class);
    }

    public function totalItems(): ESInt
    {
        return $this->totalItems;
    }

    public function totalItemsPerPage(): ESInt
    {
        return $this->totalItemsPerPage;
    }

    public function middleLimit()
    {
        return $this->middleLimit;
    }

    public function currentPage(): ESInt
    {
        return $this->currentPage;
    }

    public function linkPrefix(): ESString
    {
        return $this->linkPrefix;
    }

    public function totalPages(): ESInt
    {
        return Shoop::int($this->totalItems())->roundUp($this->totalItemsPerPage);
    }

    public function totalLinksToDisplay()
    {
        $total = $this->totalItems()->roundDown($this->totalItemsPerPage());
        if ($total->isGreaterThanUnfolded($this->middleLimit())) {
            return $this->middleLimit()->plus(2);
        }
        return $this->totalItems()->roundDown($this->totalItemsPerPage());
    }

    public function totalMiddleSurrounding()
    {
        return $this->middleLimit()->roundDown(2);
    }
    public function firstPageNumber()
    {
        return Shoop::int(1);
    }

    public function lastPageNumber()
    {
        return $this->totalPages();
    }

    public function secondPageNumber()
    {
        if ($this->totalLinksToDisplay()->isLessThanOrEqualUnfolded(2)) {
            // if the number of pages is less than or equal to 2 always return 0
            return Shoop::int(0);

        } elseif ($this->currentPage()->minus($this->totalMiddleSurrounding())->isLessThanOrEqualUnfolded(2)) {
            // if the number of pages is less than middleLimit + 2 always return 2
            // 1 2 3 4 5* 6 ... 10
            return Shoop::int(2);

        } elseif ($this->currentPage()->isGreaterThanUnfolded($this->totalPages()->minus($this->middleLimit())->plus(1))) {
            // if the current page is greater than or equal to totalPages - middleLimit + 1 always return
            // totalPages - middleLimit + 1
            // 1 ... 5 6 7 8* 9 10
            return $this->totalPages()->minus($this->middleLimit());

        } else {
            // 1 ... 4 5 6* 7 8 ... 10
            return $this->currentPage()->minus($this->totalMiddleSurrounding());

        }
    }

    public function penultimatePageNumber()
    {
        if ($this->totalLinksToDisplay()->isLessThanOrEqualUnfolded(2)) {
            // if the number of pages is less than or equal to 2 always return 0
            return Shoop::int(0);

        } elseif ($this->totalPages()->isLessThanOrEqualUnfolded($this->firstPageNumber()->plus($this->totalMiddleSurrounding()))) {
            return $this->totalPages()->minus(1);

        } else {
            return $this->secondPageNumber()->plus($this->middleLimit()->minus(1))
                ->isGreaterThanOrEqual($this->totalPages(), function($result, $int) {
                    if ($result) {
                        return $this->totalPages()->minus(1);
                    }
                    return $this->secondPageNumber()->plus($this->middleLimit()->minus(1));
                });
        }
    }

    public function middleRange()
    {
        return $this->secondPageNumber()->range($this->penultimatePageNumber())->noEmpties();
    }

    public function unfold(): string
    {
        if ($this->totalPages()->isUnfolded(1)) {
            return "";

        } elseif ($this->totalPages()->isUnfolded(2)) {
            return UIKit::nav(
                UIKit::listWith(
                    UIKit::listWith(...
                        Shoop::array([$this->anchorFor(1), $this->anchorFor(2)])
                    )->attr("class page-links")
                )
            )->attr("class pagination");

        }

        $previous = $this->anchorFor(1);
        if ($this->currentPage()->minus(1)->isGreaterThanUnfolded(1)) {
            $previous = $this->anchorFor($this->currentPage()->minus(1));

        } elseif ($this->currentPage()->isUnfolded(1)) {
            $previous = "";

        }

        $next = $this->anchorFor($this->currentPage()->plus(1));
        if ($this->currentPage()->plus(1)->isGreaterThanUnfolded($this->totalPages())) {
            $next = $this->anchorFor($this->totalPages());

        } elseif ($this->currentPage()->isUnfolded($this->totalPages())) {
            $next = "";

        }

        $links = $this->secondPageNumber()->range($this->penultimatePageNumber())
            ->each(function($pageNumber) {
                return $this->anchorFor($pageNumber);
            })->start($this->anchorFor(1))->end($this->anchorFor($this->totalPages()));

        $hasPrevious = $this->currentPage()->isGreaterThanUnfolded(1);
        $hasNext = $this->currentPage()->isLessThanUnfolded($this->totalPages());

        $navClass = "class pagination next previous"; // both
        if (! $hasNext and $hasPrevious) {
            $navClass = "class pagination previous";

        } elseif ($hasNext and ! $hasPrevious) {
            $navClass = "class pagination next";

        }

        return UIKit::nav(
            UIKit::listWith(...
                Shoop::array([$previous, $next])->plus(...$links)->noEmpties()
            )
        )->attr($navClass);
    }

    private function anchorFor($pageNumber, $isNext = false, $isPrevious = false)
    {
        $pageNumber = Type::sanitizeType($pageNumber, ESInt::class)->unfold();
        $isNext = Type::sanitizeType($isNext, ESBool::class)->unfold();
        $isPrevious = Type::sanitizeType($isPrevious, ESBool::class)->unfold();
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

        } elseif ($isNext and ! $isPrevious) {
            $link = $link->attr("class next");

        } elseif (! $isNext and $isPrevious) {
            $link = $link->attr("class previous");

        }
        return $link;
    }
}
