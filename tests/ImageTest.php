<?php

use Eightfold\Markup\Image;

test('Image is castable to string', function() {
    expect(
        (string) Image::create('alt content', 'https://8fold.pro')
            ->props('class some-class', 'id some-id')
    )->toBe(
        '<img id="some-id" class="some-class" src="https://8fold.pro" alt="alt content">'
    );
});

test('Image can have custom properties', function() {
    expect(
        Image::create('alt content', 'https://8fold.pro')
            ->props('class some-class', 'id some-id')
            ->build()
    )->toBe(
        '<img id="some-id" class="some-class" src="https://8fold.pro" alt="alt content">'
    );
});

test('Image returns correct element; with required parts', function() {
    expect(
        Image::create('alt content', 'https://8fold.pro')->build()
    )->toBe(
        '<img src="https://8fold.pro" alt="alt content">'
    );
});
