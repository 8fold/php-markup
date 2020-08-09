<?php

namespace Eightfold\Markup\Tests\Html;

use Eightfold\Markup\Tests\TestCase;
// use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Html;

class BodyTest extends TestCase
{
    public function testBodyAriaRoleCannotBeDocument()
    {
        // TODO: This appears to be getting slower, never less than 7.5 for at
        //      least 12 runs. Seems to indicate using Shoop for data compiling
        //      is slowing things down.
        $expected = '<body></body>';
        $result = Html::body()->attr('role document');
        $this->assertEqualsWithPerformance($expected, $result->unfold(), 10);
    }

    public function testBodyAriaRoleCanBeApplication()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()->attr('role application');
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }

    public function testBodyAriaRoleCannotBeArticle()
    {
        $expected = '<body></body>';
        $result = Html::body()->attr('role article');
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }

    public function testBodyAriaCanHaveAriaAttribute()
    {
        $expected = '<body aria-atomic="true"></body>';
        $result = Html::body()->attr('aria-atomic true');
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }

    public function testBodyAriaCannotHaveAriaAttribute()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()->attr('aria-pressed true', "role application");
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }
}
