# 8fold Markup for PHP

8fold Markup is NOT a new markup format akin to XML, HTML, YAML, and all the other MLs; instead, it is a library for generating most of those (XML and HTML) using PHP.

It uses a similar API found in [8fold Shoop](https://github.com/8fold/php-shoop) to create consistency across libraries.

## Installation

```
composer require 8fold/php-markup
```

## Usage

```php
$element = Element::fold("hello");

print $lement->unfold();

// output: <hello></hello>
```

You can also go straight to outputting a string.

```php
$element = Element::fold("hello");

print $element;

// output: <hello></hello>
```

You can add attributes to the elements.

```php
$element = Element::fold("hello")->attr("id my-element");

print $element;

// output: <hello id="my-element"></hello>
```

You can start with HTML, which is self-aware (understands and conforms to the w3c HTML specificaton).

If the HTML element is unknown, Markup will fall back to using Element.

```php
$html = Html::p();

print $html->unfold();

print $html;
```

There are two ways to create more compound elements (or components at this point). The first example uses `Html` while the second used `UIKit`.

If the `UIKit` component is unknown, it will fallback to `Html`.

```php
$html = Html::ul(
  Html::li("Hello, "),
  Html::li("World!")
);

print $html;

// output:
// <ul><li>Hello, </li><li>World!</li></ul>

$uikit = UIKit::listWith(
  "Hello, ",
  "World!"
);

print($uikit);

// output: same as above
```

## Why?

When it comes to semi-sctructured data, XML and derivitives can be tedious and heavy on syntax. 8fold Markup makes outputing semf-sctructured data easier and allowing for more dynamism.

Markup minifies the output, making a smaller, faster package sent over the wire.

Markup prefers one I/O step to compile (unfold) the resulting plain text, which means there is no parsing of strings to arrive at the desired output.

When it comes to HTML, attributes will be consistently ordered and, if a given attribute is not a part of the W3C HTML5 specification or is deprecated for that element, it will automatically be removed; keeping your markup up to date without having to rewrite a bunch of HTML templates.

## Guiding Principles

Minimize I/O while maximizing flexibility and extensibility.

Standardize HTML output and allow users to set their own standards.

Simplify creation of complex but typical complex elements (UIKit).

## Governance

- Higher the number, higher the priority (labels on issues).
- Benevolant Dictatorship for now.

## Contibuting

Anyone can submit PRs to add funcationality as we are only adding things we need for the solutions we are developing.

Each PR will be reviewed, including those submitted by core developers (no direct push).

## Versioning

We follow [semantic versioning](https://semver.org/). We are operating under a [zero-major](https://semver.org/#spec-item-4) at this time. `x.y.z`: `x` = major, `y` = minor, `z` = patch. In this case `x` remains at 0 to communicate that APIs may come and go without warning. With that said, changes to `y` are typically reserved for breaking changes and changes to `z` represent added features and APIs or bug fixes.

## History

This library started as three (or more) separate libraries, each at varying degrees of stability.

`Element` was at 3.0.1; `Html` was also at 3.0.1; `UIKit` was never previously released to the public.

This library replaces those three; deprecating them in the process. (The sunsetting period for the other libraries and projects will end on or after January 1st 2021.)
