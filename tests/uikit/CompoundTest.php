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
}
