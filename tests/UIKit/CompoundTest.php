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
        $expected = 1;
        $actual = UIKit::pagination(1, 1)->pageCount();
        $this->assertEquals($expected, $actual->unfold());

        $actual = UIKit::pagination(1, 10)->pageCount();
        $this->assertEquals($expected, $actual->unfold());

        $expected = 2;
        $actual = UIKit::pagination(1, 11)->pageCount();
        $this->assertEquals($expected, $actual->unfold());

        $actual = UIKit::pagination(1, 100, "/page", 1)->hasHiddenPages();
        $this->assertTrue($actual->unfold());

        $actual = UIKit::pagination(1, 100, "/page", 100)->hasHiddenPages();
        $this->assertFalse($actual->unfold());

        $expected = '<nav><ul><li><a href="/page/1">1</a></li><li><a href="/page/2">2</a></li><li><a href="/page/3">3</a></li></ul></nav>';
        $actual = UIKit::pagination(2, 3, "/page", 1);
        $this->assertEquals($expected, $actual->unfold());

        $expected = '<nav class="has-hidden-pages-previous" aria-label="Pagination navigation"><ul><li><a href="/page/8" aria-label="Goto page 8">8</a></li><li><a href="/page/6" aria-label="Goto page 6">6</a></li><li><a href="/page/1" aria-label="Goto page 1">1</a></li><li><a href="/page/5" aria-label="Goto page 5">5</a></li><li><a href="/page/6" aria-label="Goto page 6">6</a></li><li><a class="current" href="/page/7" aria-label="Current page, page 7">7</a></li><li><a href="/page/8" aria-label="Goto page 8">8</a></li><li><a href="/page/9" aria-label="Goto page 9">9</a></li><li><a href="/page/10" aria-label="Goto page 10">10</a></li></ul></nav>';
        $actual = UIKit::pagination(7, 100, "/page", 10, 7);
        $this->assertSame($expected, $actual->unfold());
    }
}
