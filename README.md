# 8fold Markup

When it comes to semi-sctructured data, XML and derivitives can be tedious and heavy on syntax. 8fold Markup makes outputing semf-sctructured data easier and allowing for more dynamism.

Markup minifies the output, making a smaller, faster package sent over the wire.

Markup prefers one I/O step to compile (unfold) the resulting plain text, which means there is no parsing of strings to arrive at the desired output.

When it comes to HTML attributes will be consistently ordered and, if a given attribute is not a part of the W3C HTML5 specification or is deprecated for that element, it will automatically be removed; keeping your markup up to date without having to rewrite a bunch of HTML templates.

There are three possible entry points, all with in the Eightfold\Markup namespace:

1. Element: Allows you to generate any XML-based element you like with or without content.
2. Html: Allows you to create HTML documents and elements with filtered and ordered attributes. (If an element is not found, it will fall back to Element.)
3. UIKit: Simplifies construction and extension of Element and Html.

Please view the various test files to see the expected operations.
