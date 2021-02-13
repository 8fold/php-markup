# 8fold UIKit

An extension of 8fold Elements.

**Note on quantity of available components:** This library is being used to generate all 8fold websites, including [8fold.pro](https://8fold.pro). Further, it is being developed using Lean and Agile Software Development concepts; therefore, if a component is missing it's because it is not needed at this time.

Having said that, we have been able to generate a diverse set of experiences with what is currently available in the kit.

## Composer

```shell
$ composer require 8fold/php-uikit
```

## Usage

The 8fold UIKit extends 8fold Elements to create more elaborate interfaces while reducing, as much as possible, the amount code required to generate that HTML.

Let's take an alert for example. Here's the HTML we're looking for:

```html
<div class="ef-alert ef-alert-success" role="alert">
  <div class="ef-alert-body">
    <h3 class="ef-alert-heading">
      Success Status
    </h3>
    <p>Lorem ipsum dolor sit amet, elit, sed do eiusmod.</p>
  </div>
</div>
```

224 characters (including whitespace). This can get pretty tedious. There are four alert types altogether, two ARIA roles (`alert` and `alertdialog`). The only content that really changes between them is the content of the `h3` tag and the body text that follows.

What if we were to do this using 8fold Elements?

```php
Html::div(
  Html::div(
      Html::h3('Success Status')->attr('class ef-alert-heading')
    , UIKit::markdown('Lorem ipsum dolor sit amet, elit, sed do eiusmod.')
  )->attr('class ef-alert-body')
)->attr('role alert', 'class ef-alert ef-alert-success')
->compile();
```


266 characters. What happens when we move it to the kit?

```php
UIKit::alert('Success status', 'Lorem ipsum dolor sit amet, elit, sed do eiusmod.')
->success()
->compile();
```

108 characters (including whitespace). 50% reduction from hand-jamming HTML.

## Opinions

8fold Elements has opinions regarding attribute ordering and helps enforce the opinions of the HTML specification. 8fold UIKit expands on that a little bit. That's what this section is all about; so, it might expand as new opinions are adopted (and as you point out areas that we might not have thought were opinions).

- Most `input` elements are set to required by default. Why? If the user does not need to give you the information to accomplish their task, why is it there? We hope this move will inspire more user experience designers and developers will consider different ways to create online forms that smaller and all users to opt-in to giving optional informational. We have found it to be a better experience all around. Of course, you can pass in a `required` key set to `false` and it will become an optional field.