<?php

namespace Eightfold\Markup\Tests\UIKit;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\UIKit;

class CompoundTest extends TestCase
{
    public function testRendersWithoutContent()
    {
        $expected = "<div><div></div></div>";
        $result = UIKit::doubleWrap()->unfold();
        $this->assertEquals($expected, $result);
    }

    public function testMarkdown()
    {
        $expected = "<p>Hello, World!</p>";
        $actual = UIKit::markdown("Hello, World!");
        $this->assertSame($expected, $actual->unfold());
    }

    public function testPagination()
    {
        $paginator = UIKit::Pagination(1, 100);
        $this->assertEquals(1, $paginator->currentPage()->unfold());
        $this->assertEquals(100, $paginator->totalItems()->unfold());
        $this->assertEquals("/feed/page", $paginator->linkPrefix()->unfold());
        $this->assertEquals(10, $paginator->totalItemsPerPage()->unfold());
        $this->assertEquals(5, $paginator->middleLimit()->unfold());

        $expected = 1;
        $actual = UIKit::pagination(1, 1)->totalPages();
        $this->assertEquals($expected, $actual->unfold());

        $actual = UIKit::pagination(1, 10)->totalPages();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 2;
        $actual = UIKit::pagination(1, 11)->totalPages();
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testPaginationTotalLinks()
    {
        $expected = 1;
        $actual = UIKit::pagination(1, 10)->totalLinksToDisplay();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 2;
        $actual = UIKit::pagination(1, 20)->totalLinksToDisplay();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 5;
        $actual = UIKit::pagination(1, 50)->totalLinksToDisplay();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 7;
        $actual = UIKit::pagination(1, 70)->totalLinksToDisplay();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 7;
        $actual = UIKit::pagination(1, 100)->totalLinksToDisplay();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 7;
        $actual = UIKit::pagination(3, 100)->totalLinksToDisplay();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 5;
        $actual = UIKit::pagination(3, 100, "/page", 10, 3)->totalLinksToDisplay();
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testPaginationFirstAndLastPageNumber()
    {
        $expected = 1;
        $actual = UIKit::pagination(10, 100)->firstPageNumber();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 10;
        $actual = UIKit::pagination(1, 100)->lastPageNumber();
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testMiddleRange()
    {
        $expected = [];

        $expected = [2, 3, 4, 5, 6];
        $actual = UIKit::pagination(1, 100)->middleRange();
        $this->assertEquals($expected, $actual->unfold());

        $expected = [2, 3, 4, 5, 6];
        $actual = UIKit::pagination(2, 100)->middleRange();
        $this->assertEquals($expected, $actual->unfold());

        $expected = [3, 4, 5, 6, 7];
        $actual = UIKit::pagination(5, 100)->middleRange();
        $this->assertEquals($expected, $actual->unfold());

        $expected = [4, 5, 6, 7, 8];
        $actual = UIKit::pagination(6, 100)->middleRange();
        $this->assertEquals($expected, $actual->unfold());

        $expected = [5, 6, 7, 8, 9];
        $actual = UIKit::pagination(8, 100)->middleRange();
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testPaginationUnfold()
    {
        $expected = '';
        $actual = UIKit::pagination(1, 10);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination"><ul><li><ul class="page-links"><li><a class="current" href="/feed/page/1" aria-label="Current page, page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li></ul></li></ul></nav>';
        $actual = UIKit::pagination(1, 20);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination"><ul><li><ul class="page-links"><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a class="current" href="/feed/page/2" aria-label="Current page, page 2">2</a></li></ul></li></ul></nav>';
        $actual = UIKit::pagination(2, 20);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination next"><ul><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a class="current" href="/feed/page/1" aria-label="Current page, page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li></ul></nav>';
        $actual = UIKit::pagination(1, 30);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a class="current" href="/feed/page/2" aria-label="Current page, page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li></ul></nav>';
        $actual = UIKit::pagination(2, 30);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination previous"><ul><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a class="current" href="/feed/page/3" aria-label="Current page, page 3">3</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a class="current" href="/feed/page/3" aria-label="Current page, page 3">3</a></li></ul></nav>';
        $actual = UIKit::pagination(3, 30);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination next"><ul><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a class="current" href="/feed/page/1" aria-label="Current page, page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/4" aria-label="Goto page 4">4</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        $actual = UIKit::pagination(1, 100);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/2" aria-label="Goto page 2">2</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a class="current" href="/feed/page/4" aria-label="Current page, page 4">4</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        $actual = UIKit::pagination(4, 100);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/4" aria-label="Goto page 4">4</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/3" aria-label="Goto page 3">3</a></li><li><a href="/feed/page/4" aria-label="Goto page 4">4</a></li><li><a class="current" href="/feed/page/5" aria-label="Current page, page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        $actual = UIKit::pagination(5, 100);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination next previous"><ul><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a class="current" href="/feed/page/8" aria-label="Current page, page 8">8</a></li><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a href="/feed/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        $actual = UIKit::pagination(8, 100);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="pagination previous"><ul><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a class="current" href="/feed/page/10" aria-label="Current page, page 10">10</a></li><li><a href="/feed/page/1" aria-label="Goto page 1">1</a></li><li><a href="/feed/page/5" aria-label="Goto page 5">5</a></li><li><a href="/feed/page/6" aria-label="Goto page 6">6</a></li><li><a href="/feed/page/7" aria-label="Goto page 7">7</a></li><li><a href="/feed/page/8" aria-label="Goto page 8">8</a></li><li><a href="/feed/page/9" aria-label="Goto page 9">9</a></li><li><a class="current" href="/feed/page/10" aria-label="Current page, page 10">10</a></li></ul></nav>';
        $actual = UIKit::pagination(10, 100);
        $this->assertEquals($expected, $actual->unfold());
    }

    public function testWebHead()
    {
        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1">';
        $actual = UIKit::webHead();
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1"><link type="image/x-icon" rel="icon" href="favicon.ico"><link rel="apple-touch-icon" href="apple-touch-icon.png" sizes="180x180"><link rel="image/png" href="favicon-32x32.png" sizes="32x32"><link rel="image/png" href="favicon-16x16.png" sizes="16x16">';
        $actual = UIKit::webHead()->favicons(
            "favicon.ico",
            "apple-touch-icon.png",
            "favicon-32x32.png",
            "favicon-16x16.png"
        );
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1"><link type="image/x-icon" rel="icon" href="favicon.ico"><link rel="stylesheet" href="main.css"><script src="main.js"></script>';
        $actual = UIKit::webHead()
            ->favicons("favicon.ico")
            ->styles("main.css")
            ->scripts("main.js");
        $this->assertEquals($expected, $actual->unfold());

    // <meta content="https://liberatedelephant.com/media/poster.png" property="og:image">

    // <meta content="1280" property="og:image:width">
    // <meta content="720" property="og:image:height">
    // <meta name="twitter:card" content="summary_large_image">
    // <meta content="@ElephantTaming" property="twitter:site">
        $expected = '<meta name="viewport" content="width=device-width,initial-scale=1"><meta content="website" property="og:type"><meta content="8fold PHP Markup" property="og:title"><meta content="https://8fold.dev/open-source/markup/php" property="og:url"><meta content="Get the HTML out of your PHP with this HTML generator." property="og:description"><meta name="twitter:card" content="summary_large_image"><meta name="twitter:" content="site 8foldPros">';
        $actual = UIKit::webHead()->social(
            "8fold PHP Markup",
            "https://8fold.dev/open-source/markup/php",
            "Get the HTML out of your PHP with this HTML generator."
        )->socialTwitter("8foldPros");
        $this->assertEquals($expected, $actual->unfold());
    }
}
