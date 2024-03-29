<?php

namespace Eightfold\Markup\Tests\Html;

use PHPUnit\Framework\TestCase;
use Eightfold\Foldable\Tests\PerformantEqualsTestFilter as AssertEquals;

use Eightfold\Markup\Html;

use Eightfold\HtmlComponent\Component;

/**
 * @group HtmlElement
 * @group 1.0.0
 */
class HtmlElementTest extends TestCase
{
    /**
     * @test
     */
    public function test_ordering_lightweight()
    {
        // TODO: filter invalid attributes - ??
        //      valid parent check
        // 0.2.0 - time peaked at 10ms
        AssertEquals::applyWith(
            '<p role="alert" id="something" class="somethingElse somethingElse2" style="background: red;" type="some_type" tabindex="1" accesskey="S">Hello</p>',
            "string",
            10.52, // 10.03, // 9.89, // 9.69, // 8.42, // 8.34, // 7.8, // 7.38, // updated shoop 8.11 // 7.82 // 7.6 // 6.85
            559
        )->unfoldUsing(
            Html::p('Hello')
                ->attr(
                    'role alert',
                    'accesskey S',
                    'tabindex 1',
                    'type some_type',
                    'style background: red;',
                    'class somethingElse somethingElse2',
                    'id something')
                ->unfold()
        );
    }

    /**
     * @test
     */
    public function full_page()
    {
        AssertEquals::applyWith(
            '<div><div></div></div>',
            "string",
            4.12, // 3.19, // 2.48, // 1.99, // 1.48, // 1.29, // updated shoop 5.24 // 4.98
            1
        )->unfoldUsing(
            Html::div(Html::div())->unfold()
        );

        AssertEquals::applyWith(
            '<html><head><title>Hello, World!</title><style></style></head><body><img src="http://example.com" alt="A picture of the world"><p is="my-component">Hello, World!</p><my-link href="http://example.com/domination">World Domination</my-link><p>Done!</p></body></html>',
            "string",
            20.44, // 18.93, // 18.84, // 18.13, // 17.62, // 15.45, // 8.56, // 7.07, // 6.69, // 6.64, // 6.59, // 6.11, // 5.53, // 5.34, // 9.56 // 7.14 // 6.94
            1
        )->unfoldUsing(
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
            )->unfold()
        );
    }

    /**
     * @test
     */
    public function child_elements_omitting_end_tag()
    {
        AssertEquals::applyWith(
            '<object><param name="hello" value="world"><param name="you" value="are"><param name="awesome" value="today!"></object>',
            "string",
            15.21, // 12.75, // 12.57, // 9.17, // 5.34, // 4.11, // 3.51, // 3.01, // updated shoop 6.87 // 6.67 // 6.24
            1
        )->unfoldUsing(
            Html::object(
                Html::param()
                    ->attr('name hello', 'value world'),
                Html::param()
                    ->attr('name you', 'value are'),
                Html::param()
                    ->attr('name awesome', 'value today!')
            )->unfold()
        );

        AssertEquals::applyWith(
            '<hr>',
            "string",
            1.3, // 0.5, // 0.46, // 0.44, // 1.44
            1
        )->unfoldUsing(
            Html::hr()->unfold()
        );

        AssertEquals::applyWith(
            '<head><title>Hello, World!</title><link rel="stylesheet" href="#"><link rel="stylesheet" href="#"></head>',
            "string",
            12.1, // 11.66, // 10.72, // 8.63, // 8.37, // 4.93, // 4.86, // 4.73, // 4.01, // 3.14, // 2.84, // 5.24
            1
        )->unfoldUsing(
            Html::head(
                  Html::title('Hello, World!'),
                  Html::link()->attr('rel stylesheet', 'href #'),
                  Html::link()->attr('href #', 'rel stylesheet')
            )->unfold()
        );
    }

    /**
     * @test
     */
    public function nested_elements_with_string()
    {
        AssertEquals::applyWith(
            '<ul><li>Hello<ol><li>My name is:</li></ol></li></ul>',
            "string",
            16.17, // 10.23, // 8.76, // 8.22, // 6.19, // 4.95, // 4.16, // 3.04, // 3, // 2.88, // 2.78, // 2.53, // updated shoop 7.24
            1
        )->unfoldUsing(
            Html::ul(
                Html::li(
                     'Hello'
                    , Html::ol(
                        Html::li('My name is:')
                    )
                )
            )->unfold()
        );

        AssertEquals::applyWith(
            '<a class="some-class" href="http://example.com">Hello</a>',
            "string",
            4.87, // 4.5, // 4.04, // 3.99, // 3.93, // 3.9, // 3.75, // 3.32, // 1.76, // 1.6, // 1.56, // 1.21, // 1.13, // 0.97, // 0.87, // 2.37
            1
        )->unfoldUsing(
            Html::a('Hello')->attr('class some-class', 'href http://example.com')
                ->unfold()
        );
    }

    /**
     * @test
     */
    public function all_passed_attributes_end_up_in_the_element()
    {
        AssertEquals::applyWith(
            '<body role="document"></body>',
            "string",
            10.55, // 3, // 2.83, // 2.24, // 2.09, // 1.12, // 0.95, // 0.85, // 0.78, // updated shoop 4.13 // 6.15 // 6.12 // 5.76
            1
        )->unfoldUsing(
            Html::body()->attr("role document")->unfold()
        );

         AssertEquals::applyWith(
            '<body role="application"></body>',
            "string",
            6.98, // 3.25, // 2.81, // 2.59, // 2.56, // 2.29, // 1.95, // 1.52, // 0.9, // 0.85, // 0.83, // 0.75, // 0.72, // 0.67, // 0.8 // 0.74 // 0.72 // 0.58 // 0.56 // 0.32 // 0.64 // 0.53 // 0.41
            1
        )->unfoldUsing(
            Html::body()->attr("role application")->unfold()
        );

         AssertEquals::applyWith(
            '<body id="acceptable"></body>',
            "string",
            3.02, // 2.61, // 2.28, // 1.17, // 0.9, // 0.72, // 0.76 // 0.7 // 0.68 // 0.57 // 0.25 // 0.19 // 5.85
            1
        )->unfoldUsing(
            Html::body()->attr("id acceptable")->unfold()
        );
    }
}
