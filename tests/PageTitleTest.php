<?php

use Eightfold\Markup\PageTitle;

test('Page title can return without tag', function() {
    expect(
        PageTitle::create(['Hello!', 'How are you?'], ' : ')->reversed()
            ->stringOnly()->build()
    )->toBe(
        'How are you? : Hello!'
    );
});

test('Page title respects custom separator', function() {
    expect(
        PageTitle::create(['Hello!', 'How are you?'], ' : ')->build()
    )->toBe(
        '<title>Hello! : How are you?</title>'
    );
});

test('Page title can have multiple parts', function() {
    expect(
        PageTitle::create(['Hello!', 'How are you?'])->build()
    )->toBe(
        '<title>Hello! | How are you?</title>'
    );
});

test('Page title returns correct element', function() {
    expect(
        PageTitle::create(['Hello!'])->build()
    )->toBe(
        '<title>Hello!</title>'
    );
});
