<?php

declare(strict_types=1);

namespace Eightfold\Markup\Tests;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\Image;

class ImageTest extends TestCase
{
    /**
     * @test
     */
    public function image_is_castable_to_string(): void
    {
        $this->assertEquals(
            (string) Image::create('alt content', 'https://8fold.pro')
                ->props('class some-class', 'id some-id'),
            '<img id="some-id" class="some-class" src="https://8fold.pro" alt="alt content">'
        );
    }

    /**
     * @test
     */
    public function image_can_have_custom_properties(): void
    {
        $this->assertEquals(
            Image::create('alt content', 'https://8fold.pro')
                ->props('class some-class', 'id some-id')
                ->build(),
            '<img id="some-id" class="some-class" src="https://8fold.pro" alt="alt content">'
        );
    }

    /**
     * @test
     */
    public function image_returns_correct_element_with_required_parts(): void
    {
        $this->assertEquals(
            Image::create('alt content', 'https://8fold.pro')->build(),
            '<img src="https://8fold.pro" alt="alt content">'
        );
    }
}
