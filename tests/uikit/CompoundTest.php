<?php

namespace Eightfold\UIKit\Tests;

use PHPUnit\Framework\TestCase;

use Eightfold\UIKit\UIKit;

class CompoundTest extends TestCase
{
    public function testRendersWithoutContent()
    {
        $expected = "<div><div></div></div>";
        $result = UIKit::doubleWrap()->unfold();
        $this->assertEquals($expected, $result);
    }
}
