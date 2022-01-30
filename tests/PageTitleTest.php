<?php

declare(strict_types=1);

namespace Eightfold\Markup\Tests;

use PHPUnit\Framework\TestCase;

use Eightfold\Markup\PageTitle;

class PageTitleTest extends TestCase
{
    /**
     * @test
     */
    public function page_title_is_castable_to_string(): void
    {
        $this->assertEquals(
            (string) PageTitle::create(['Hello!', 'How are you?'], ' : ')
                ->reversed(),
            '<title>How are you? : Hello!</title>'
        );
    }

    /**
     * @test
     */
    public function page_title_can_return_with_tag(): void
    {
        $this->assertEquals(
            PageTitle::create(['Hello!', 'How are you?'], ' : ')->reversed()
                ->stringOnly()->build(),
            'How are you? : Hello!'
        );
    }

    /**
     * @test
     */
    public function page_title_respects_custom_separator(): void
    {
        $this->assertEquals(
            PageTitle::create(['Hello!', 'How are you?'], ' : ')->build(),
            '<title>Hello! : How are you?</title>'
        );
    }

    /**
     * @test
     */
    public function page_title_can_have_multiple_parts(): void
    {
        $this->assertEquals(
            PageTitle::create(['Hello!', 'How are you?'])->build(),
            '<title>Hello! | How are you?</title>'
        );
    }

    /**
     * @test
     */
    public function page_title_returns_correct_element(): void
    {
        $this->assertEquals(
            PageTitle::create(['Hello!'])->build(),
            '<title>Hello!</title>'
        );
    }
}
