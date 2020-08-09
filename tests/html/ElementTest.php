<?php

namespace Eightfold\Markup\Tests\Html;

use Eightfold\Markup\Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Html;

use Eightfold\HtmlComponent\Component;

class ElementTest extends TestCase
{
    protected $maxMilliseconds = 5.5;

    public function testObjectParams()
    {
        $expected = '<object><param name="hello" value="world"><param name="you" value="are"><param name="awesome" value="today!"></object>';
        $result = Html::object(
            Html::param()
                ->attr('name hello', 'value world'),
            Html::param()
                ->attr('name you', 'value are'),
            Html::param()
                ->attr('name awesome', 'value today!')
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $result, 20);
    }

    public function testHrBase()
    {
        $expected = '<hr>';
        $result = Html::hr()->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }

    public function testOlListItemSublists()
    {
        $expected =
            '<ul>'.
                '<li>Hello'.
                    '<ol>'.
                        '<li>My name is:</li>'.
                    '</ol>'.
                '</li>'.
            '</ul>';
        $result = Html::ul(
            Html::li(
                 'Hello'
                , Html::ol(
                    Html::li('My name is:')
                )
            )
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $result, 21.5);
    }

    public function testHeadLinks()
    {
        $expected = '<head><title>Hello, World!</title><link rel="stylesheet" href="#"><link rel="stylesheet" href="#"></head>';
        $result = Html::head(
              Html::title('Hello, World!'),
              Html::link()->attr('rel stylesheet', 'href #'),
              Html::link()->attr('href #', 'rel stylesheet')
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $result, 12);
    }

    public function testCanHaveMicrodata()
    {
        $expected = '<a href="http://example.com" itemprop="sameAs">Hello</a>';
        $result = Html::a("Hello")
            ->attr("href http://example.com", "itemprop sameAs")
            ->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }

    public function testCanHaveRDFA()
    {
        $expected = '<div vocab="http://schema.org/"></div>';
        $result = Html::div()->attr("vocab http://schema.org/")->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }

    public function testHeadStyle()
    {
        $expected = '<head><title>Hello, World!</title><style type="text/css" media="print">.class { background: #000000; }</style></head>';
        $result = Html::head(
              Html::title('Hello, World!')
            , Html::style('.class { background: #000000; }')
                ->attr('media print', 'type text/css')
        )->unfold();
        $this->assertEqualsWithPerformance($expected, $result, 11.5);
    }

    public function testInvalidAttributeIsExcludedFromAttributeList()
    {
        $expected = '<textarea></textarea>';
        $result = Html::textarea()->attr('value something');
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }

    public function testAnchorWithInitialAttributesAndAddedAttributesAtCompile()
    {
        $expected = '<a class="some-class" href="http://example.com">Hello</a>';
        $result = Html::a('Hello')
            ->attr('class some-class', 'href http://example.com')
            ->unfold();
        $this->assertEqualsWithPerformance($expected, $result);
    }

    public function testAbbrCanHaveTitle()
    {
        // $actual = Html::a("hello")->unfold();
        $expected = '<abbr title="Hello">hi</abbr>';
        $actual = Html::abbr("hi")->attr("title Hello");
        $this->assertEqualsWithPerformance($expected, $actual->unfold());
    }

    public function testDetailsAndSummary()
    {
        $expected = '<details><summary>Hello</summary><p>Here it is.</p></details>';
        $actual = Html::details(
            Html::summary("Hello"),
            Html::p("Here it is.")
        );
        $this->assertEqualsWithPerformance($expected, $actual->unfold(), 6);
    }
}
