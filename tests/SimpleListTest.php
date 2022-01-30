<?php

declare(strict_types=1);

namespace Eightfold\Markup\Tests;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\SimpleList;

use Eightfold\Markup\Anchor;

class SimpleListTest extends TestCase
{
    /**
     * @test
     */
    public function list_is_castable_to_string(): void
    {
        $this->assertEquals(
            (string) SimpleList::create('list item'),
            '<ul><li>list item</li></ul>'
        );
    }

    /**
     * @test
     */
    public function list_can_have_custom_properties(): void
    {
        $this->assertEquals(
            SimpleList::create(
                'list item',
                Anchor::create('hello', 'file://example.pdf')
            )->props('class some-class', 'id some-id')->build(),
            '<ul id="some-id" class="some-class"><li>list item</li><li><a href="file://example.pdf">hello</a></li></ul>'
        );
    }

    /**
     * @test
     */
    public function list_can_be_ordered(): void
    {
        $this->assertEquals(
            SimpleList::create(
                'list item'
            )->ordered()->build(),
            '<ol><li>list item</li></ol>'
        );
    }

    /**
     * @test
     */
    public function list_returns_correct_default_element_with_required_parts(): void
    {
        $this->assertEquals(
            SimpleList::create(
                'list item'
            )->build(),
            '<ul><li>list item</li></ul>'
        );
    }
}
