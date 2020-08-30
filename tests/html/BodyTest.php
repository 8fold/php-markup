<?php

namespace Eightfold\Markup\Tests\Html;

use Eightfold\Markup\Tests\TestCase;
use Eightfold\Foldable\Tests\TestEqualsPerformance as AssertEquals;

use Eightfold\Markup\Html;

use Eightfold\Markup\Html\Elements\Sections\Body;

/**
 * @group body
 */
class BodyTest extends TestCase
{
    /**
     * @test
     * @group current
     */
    public function does_not_include_default_role()
    {
        AssertEquals::applyWith(
            '<body></body>',
            "string",
            6.15 // 6.12 // 5.76
        )->unfoldUsing(
            Html::body()->attr('role document')->unfold()
        );

         AssertEquals::applyWith(
            '<body></body>',
            "string",
            0.64 // 0.53 // 0.41
        )->unfoldUsing(
            Html::body()->attr('role application')->unfold()
        );

         AssertEquals::applyWith(
            '<body id="acceptable"></body>',
            "string",
            5.85
        )->unfoldUsing(
            Html::body()->attr("id acceptable")->unfold()
        );
    }
}
