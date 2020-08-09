<?php

namespace Eightfold\Markup\Tests\Html;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Html;

class BodyTest extends TestCase
{
    private $start = 0;

    private function assertEqualsWithPerformance(
        $expected,
        $actual,
        $maxMilliseconds = 3.7
    )
    {
        // setUp() return, set private var, etc.
        $accountForExtraWork = 1;

        $elapsed = hrtime(true) - $this->start;
        $milliseconds = $elapsed/1e+6 - $accountForExtraWork;

        $this->assertEquals($expected, $actual);
        $this->assertTrue(
            $milliseconds <= $maxMilliseconds,
            "{$milliseconds}ms is greater than {$maxMilliseconds}ms");
    }

    protected function setUp(): void
    {
        $this->start = hrtime(true);
    }

    public function testBodyAriaRoleCannotBeDocument()
    {
        $expected = '<body></body>';
        $result = Html::body()->attr('role document');
        $this->assertEqualsWithPerformance($expected, $result->unfold());
    }

    public function testBodyAriaRoleCanBeApplication()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()->attr('role application');
        $this->assertEquals($expected, $result->unfold());
    }

    public function testBodyAriaRoleCannotBeArticle()
    {
        $expected = '<body></body>';
        $result = Html::body()->attr('role article');
        $this->assertEquals($expected, $result->unfold());
    }

    public function testBodyAriaCanHaveAriaAttribute()
    {
        $expected = '<body aria-atomic="true"></body>';
        $result = Html::body()->attr('aria-atomic true');
        $this->assertEquals($expected, $result->unfold());
    }

    public function testBodyAriaCannotHaveAriaAttribute()
    {
        $expected = '<body role="application"></body>';
        $result = Html::body()->attr('aria-pressed true', "role application");
        $this->assertEquals($expected, $result->unfold());
    }
}
