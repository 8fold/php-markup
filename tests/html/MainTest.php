<?php

namespace Eightfold\Markup\Tests\Html;

use Eightfold\Markup\Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Html;

use Eightfold\HtmlComponent\Component;

class MainTest extends TestCase
{
    protected $maxMilliseconds = 5.5;

    public function testSelectorAttributeOrderBase()
    {
        $expected = '<p role="alert" id="something" class="somethingElse somethingElse2" style="background: red;" tabindex="1" accesskey="S">Hello</p>';
        $result = Html::p('Hello')
            ->attr(
                  'role alert'
                , 'accesskey S'
                , 'tabindex 1'
                , 'type some_type'
                , 'style background: red;'
                , 'class somethingElse somethingElse2'
                , 'id something')
            ->unfold();
        $this->assertEqualsWithPerformance($expected, $result, 10);
    }

    // public function testValidParentCheck()
    // {
    //     $expected = '<ul>'."\n".
    //         '<!-- `dt` says: I do not think I can be a direct descendant of `ul` -->'."\n".
    //         '<dt>Hello, World!</dt></ul>';
    //     $result = Html::ul(
    //         Html::dt('Hello, World!')
    //     )->unfold();
    //     $this->assertEqualsWithPerformance($expected, $result);
    // }

    public function testPage()
    {
        $expected = '<!doctype html><html><head><title>Hello, World!</title><style></style></head><body><img src="http://example.com" alt="A picture of the world"><p is="my-component">Hello, World!</p><my-link href="http://example.com/domination">World Domination</my-link><p>Done!</p></body></html>';
        $result =
            Html::html(
                  Html::head(
                        Html::title('Hello, World!')
                      , Html::style()
                    )
                , Html::body(
                      Html::img()
                        ->attr('src http://example.com', 'alt A picture of the world')
                    , Html::p('Hello, World!')
                        ->attr("is my-component")
                    , Html::my_link('World Domination')
                        ->attr('href http://example.com/domination')
                    , '<p>Done!</p>'
                 )
            )->unfold();
        $this->assertEqualsWithPerformance($expected, $result, 33.25);
    }

    public function testDoubleDiv()
    {
        $expected = "<div><div></div></div>";
        $actual = Html::div(Html::div())->unfold();
        $this->assertEqualsWithPerformance($expected, $actual, 7.25);
    }
}
