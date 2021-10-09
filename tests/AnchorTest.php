<?php

use Eightfold\Markup\Anchor;

test('Anchor can have custom properties', function() {
    expect(
        Anchor::create('link content', 'https://8fold.pro')
            ->props('class some-class', 'id some-id')
            ->build()
    )->toBe(
        '<a id="some-id" class="some-class" href="https://8fold.pro">link content</a>'
    );
});

test('Anchor returns correct element; with required parts', function() {
    expect(
        Anchor::create('link content', 'https://8fold.pro')->build()
    )->toBe(
        '<a href="https://8fold.pro">link content</a>'
    );
});
