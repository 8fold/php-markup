<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\UIKit;

class PaginationTest extends TestCase
{
    public function testPagination()
    {
        // $paginator = UIKit::Pagination(1, 100);
        // $this->assertEquals(1, $paginator->currentPage()->unfold());
        // $this->assertEquals(100, $paginator->totalItems()->unfold());
        // $this->assertEquals("/feed/page", $paginator->linkPrefix()->unfold());
        // $this->assertEquals(10, $paginator->totalItemsPerPage()->unfold());
        // $this->assertEquals(5, $paginator->middleLimit()->unfold());

        // $expected = 1;
        // $actual = UIKit::pagination(1, 1)->totalPages();
        // $this->assertEquals($expected, $actual->unfold());

        // $actual = UIKit::pagination(1, 10)->totalPages();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 2;
        // $actual = UIKit::pagination(1, 11)->totalPages();
        // $this->assertEquals($expected, $actual->unfold());
    }

    public function testPaginationTotalLinks()
    {
        // $expected = 1;
        // $actual = UIKit::pagination(1, 10)->totalLinksToDisplay();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 2;
        // $actual = UIKit::pagination(1, 20)->totalLinksToDisplay();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 5;
        // $actual = UIKit::pagination(1, 50)->totalLinksToDisplay();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 7;
        // $actual = UIKit::pagination(1, 70)->totalLinksToDisplay();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 7;
        // $actual = UIKit::pagination(1, 100)->totalLinksToDisplay();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 7;
        // $actual = UIKit::pagination(3, 100)->totalLinksToDisplay();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 5;
        // $actual = UIKit::pagination(3, 100, "/page", 10, 3)->totalLinksToDisplay();
        // $this->assertEquals($expected, $actual->unfold());
    }

    public function testPaginationFirstAndLastPageNumber()
    {
        // $expected = 1;
        // $actual = UIKit::pagination(10, 100)->firstPageNumber();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = 10;
        // $actual = UIKit::pagination(1, 100)->lastPageNumber();
        // $this->assertEquals($expected, $actual->unfold());
    }

    public function testMiddleRange()
    {
        // $expected = [];

        // $expected = [2, 3, 4, 5, 6];
        // $actual = UIKit::pagination(1, 100)->middleRange();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = [2, 3, 4, 5, 6];
        // $actual = UIKit::pagination(2, 100)->middleRange();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = [3, 4, 5, 6, 7];
        // $actual = UIKit::pagination(5, 100)->middleRange();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = [4, 5, 6, 7, 8];
        // $actual = UIKit::pagination(6, 100)->middleRange();
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = [5, 6, 7, 8, 9];
        // $actual = UIKit::pagination(8, 100)->middleRange();
        // $this->assertEquals($expected, $actual->unfold());
    }

    public function testPaginationUnfold()
    {
        // $expected = '';
        // $actual = UIKit::pagination(1, 10);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination"><ul><li><ul class="page-links"><li><a class="current" href="/feed/page/1" aria-label="Current page, page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li></ul></li></ul></nav>';
        // $actual = UIKit::pagination(1, 20);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination"><ul><li><ul class="page-links"><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a class="current" href="/feed/page/2" aria-label="Current page, page 2">2</a></li></ul></li></ul></nav>';
        // $actual = UIKit::pagination(2, 20);
        // $this->assertEquals($expected, $actual->unfold());

        // // TODO: Really need to work on this - don't have a business need yet
        // $expected = '<nav class="pagination next"><ul><li><a class="current" href="/feed/page/1" aria-label="Current page, page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li></ul></nav>';
        // $actual = UIKit::pagination(1, 30);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a class="current" href="/feed/page/2" aria-label="Current page, page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li></ul></nav>';
        // $actual = UIKit::pagination(2, 30);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination previous"><ul><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a class="current" href="/feed/page/3" aria-label="Current page, page 3">3</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a class="current" href="/feed/page/3" aria-label="Current page, page 3">3</a></li></ul></nav>';
        // $actual = UIKit::pagination(3, 30);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination next"><ul><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a class="current" href="/feed/page/1" aria-label="Current page, page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/4" aria-label="Goto page 4">4</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        // $actual = UIKit::pagination(1, 100);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a class="current" href="/feed/page/4" aria-label="Current page, page 4">4</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        // $actual = UIKit::pagination(4, 100);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/4" aria-label="Goto page 4">4</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/4" aria-label="Goto page 4">4</a></li><li><a class="current" href="/feed/page/5" aria-label="Current page, page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        // $actual = UIKit::pagination(5, 100);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a class="current" href="/feed/page/8" aria-label="Current page, page 8">8</a></li><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        // $actual = UIKit::pagination(8, 100);
        // $this->assertEquals($expected, $actual->unfold());

        // $expected = '<nav class="pagination previous"><ul><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a class="current" href="/feed/page/10" aria-label="Current page, page 10">10</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a href="/feed/page/8" aria-label="Goto page 8">8</a></li><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a class="current" href="/feed/page/10" aria-label="Current page, page 10">10</a></li></ul></nav>';
        // $actual = UIKit::pagination(10, 100);
        // $this->assertEquals($expected, $actual->unfold());
    }
}
