<?php

declare(strict_types=1);

namespace Eightfold\Markup\Tests;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Anchor;

class AnchorTest extends TestCase
{
    /**
     * @test
     */
    public function anchor_is_castable_to_string(): void
    {
        $this->assertEquals(
            (string) Anchor::create('link content', 'https://8fold.pro')
                ->props('class some-class', 'id some-id'),
            '<a id="some-id" class="some-class" href="https://8fold.pro">link content</a>'
        );
    }

    /**
     * @test
     */
    public function anchor_can_have_custom_properties(): void
    {
        $this->assertEquals(
            Anchor::create('link content', 'https://8fold.pro')
                ->props('class some-class', 'id some-id')
                ->build(),
            '<a id="some-id" class="some-class" href="https://8fold.pro">link content</a>'
        );
    }

    /**
     * @test
     */
    public function anchor_returns_correct_element_with_required_parts(): void
    {
        $this->assertEquals(
            Anchor::create('link content', 'https://8fold.pro')->build(),
            '<a href="https://8fold.pro">link content</a>'
        );
    }
}
