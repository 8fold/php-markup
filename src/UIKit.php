<?php

namespace Eightfold\Markup;

use Eightfold\Markup\Element;
use Eightfold\Markup\Html;

use Eightfold\Shoop\{Shoop, ESString};


class UIKit extends Html
{
    static public function webView($title, ...$content)
    {
        $class = self::class("webView", self::CLASSES)->unfold();
        return new $class($title, ...$content);
    }

    static public function doubleWrap(...$content)
    {
        $class = self::class("doubleWrap", self::CLASSES)->unfold();
        return new $class(...$content);
    }

    static public function tableWith(...$rows)
    {
        $class = self::class("tableWith", self::CLASSES)->unfold();
        return new $class(...$rows);
    }

    static public function listWith(...$content)
    {
        $class = self::class("listWith", self::CLASSES)->unfold();
        return new $class(...$content);
    }

    static public function fileInput($label, $name)
    {
        $class = self::class("fileInput", self::CLASSES)->unfold();
        return new $class($label, $name);
    }

    static public function hiddenInput($name, $value)
    {
        $class = self::class("hiddenInput", self::CLASSES)->unfold();
        return new $class($name, $value);
    }

    // TODO: Should be able to accept unfoldable
    static public function anchor(string $text, string $href)
    {
        $class = self::class("anchor", self::CLASSES)->unfold();
        return new $class($text, $href);
    }

    static public function image(string $altText, string $path)
    {
        $class = self::class("image", self::CLASSES)->unfold();
        return new $class($altText, $path);
    }

    static public function markdown(string $markdown, array $config = [])
    {
        $class = self::class("markdown", self::CLASSES)->unfold();
        return new $class($markdown, $config);
    }

    static public function stripeElements($formId, $apiKey, $inputLabel, $buttonLabel)
    {
        $class = self::class("stripeElements", self::CLASSES)->unfold();
        return new $class($formId, $apiKey, $inputLabel, $buttonLabel);
    }

    static public function __callStatic(string $element, array $elements)
    {
        $class = Html::class($element, self::CLASSES);
        if ($class->count()->is(0)->unfold()) {
            return Html::$element(...$elements);
        }

        switch ($element) {
            case ('primary_nav'
                || 'secondary_nav'
                || 'side_nav'
                || 'user_card'):
                return new $class(...$elements);
                break;

            case ('glyph' || 'head' || 'avatar'):
                return new $class($args[0]);
                break;

            case ('footer' || 'image'):
                if (isset($args[1])) {
                    return new $class($args[0], $args[1]);

                }
                return new $class($args[0]);
                break;

            case ('alert'):
                return new $class($args[0], $args[1]);
                break;

            case 'form' || 'header':
                $main = $args[0];
                unset($args[0]);
                return new $class($main, ...$args);
                break;

            case ('select'
                || 'textarea'
                || 'markdown_textarea'
                || 'textInput'
                || 'date_input'):
                if (isset($args[3])) {
                    return new $class($args[0], $args[1], $args[2], $args[3]);

                } elseif ($isset(args[2])) {
                    return new $class($args[0], $args[1], $args[3]);

                }
                return new $class($args[0], $args[1]);
                break;

            case 'progress':
                if (isset($args[2])) {
                    return new $class($args[0], $args[1], $args[2]);

                } elseif (isset($args[1])) {
                    return new $class($args[0], $args[1]);

                }
                return new $class($args[0]);
                break;

            default:
                return parent::$element(...$args);
                break;
        }
    }

    private const CLASSES = [
        'webView'   => UIKit\Elements\Pages\WebView::class,
        'form'      => UIKit\Elements\Forms\Form::class,
        'listWith'  => UIKit\Elements\Simple\SimpleList::class,
        'tableWith' => UIKit\Elements\Simple\SimpleTable::class,
        'anchor'    => UIKit\Elements\Simple\Anchor::class,
        'glyph'     => UIKit\Elements\Simple\Glyph::class,
        'image'     => UIKit\Elements\Simple\Image::class,
        // 'button'    => UIKit\Elements\FormControls\Button::class,

        'stripeElements' => UIKit\Elements\FormControls\StripeElements::class,
        'hiddenInput'    => UIKit\Elements\FormControls\InputHidden::class,
        'fileInput'      => UIKit\Elements\FormControls\InputFile::class,
        'textInput'      => UIKit\Elements\FormControls\InputText::class,
        // , 'user_card'    => UIKit\Elements\Simple\UserCard::class

        // , 'alert'            => UIKit\Elements\Compound\Alert::class
        'doubleWrap' => UIKit\Elements\Compound\DoubleWrap::class,
        'markdown'   => UIKit\Elements\Compound\Markdown::class
        // , 'primary_nav'      => UIKit\Elements\Compound\NavigationPrimary::class
        // , 'secondary_nav'    => UIKit\Elements\Compound\NavigationSecondary::class
        // , 'side_nav'         => UIKit\Elements\Compound\NavigationSide::class
        // , 'footer'           => UIKit\Elements\Compound\Footer::class
        // // , 'head'             => UIKit\Elements\Compound\Head::class
        // , 'header'           => UIKit\Elements\Compound\Header::class
        // , 'action_container' => UIKit\Elements\Compound\ActionContainer::class

        // , 'select'             => UIKit\Elements\FormControls\Select::class

        // , 'progress'           => UIKit\Elements\FormControls\Progress::class
        // , 'textarea'           => UIKit\Elements\FormControls\Textarea::class
        // , 'markdown_textarea'  => UIKit\Elements\FormControls\TextareaMarkdown::class
        // , 'date_input'         => UIKit\Elements\FormControls\InputDate::class





    ];
}
