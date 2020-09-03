<?php

namespace Eightfold\Markup;

use Eightfold\Markup\Element;
use Eightfold\Markup\Html;

use Eightfold\Shoop\Shoop;
use Eightfold\Shoop\ESString;


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

    static public function pagination(
        $currentPage,
        $totalItems,
        $linkPrefix = "/feed/page",
        $totalItemsPerPage = 10,
        $middleLimit = 5
    )
    {
        $class = self::class("pagination", self::CLASSES)->unfold();
        return new $class(
            $currentPage,
            $totalItems,
            $linkPrefix,
            $totalItemsPerPage,
            $middleLimit
        );
    }

    static public function tableWith(...$rows)
    {
        $class = self::class("tableWith", self::CLASSES)->unfold();
        return new $class(...$rows);
    }

    static public function listWith(...$content)
    {
        return new UIKit\Elements\Simple\SimpleList(...$content);
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
        return new UIKit\Elements\Simple\Anchor($text, $href);
    }

    static public function image(string $altText, string $path)
    {
        return new UIKit\Elements\Simple\Image($altText, $path);
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

    static public function socialMeta(
        string $title,
        string $url,
        string $description,
        string $image = "",
        string $type = "website",
        string $appId = ""
    )
    {
        $class = self::class("socialMeta", self::CLASSES)->unfold();
        return new $class($title, $url, $description, $image, $type, $appId);
    }

    static public function webHead()
    {
        $class = self::class("webHead", self::CLASSES)->unfold();
        return new $class();
    }

    static public function accordion(
        string $summaryId,
        $summary,
        ...$content
    )
    {
        $class = self::class("accordion", self::CLASSES)->unfold();
        return new $class($summaryId, $summary, ...$content);
    }

    static public function __callStatic(string $element, array $elements)
    {
        if (array_key_exists($element, static::CLASSES)) {
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

                case 'header':
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
        return Html::$element(...$elements);
    }

    private const CLASSES = [
        'webView'   => \Eightfold\Markup\UIKit\Elements\Pages\WebView::class,
        // 'form'      => UIKit\Elements\Forms\Form::class,
        'listWith'  => \Eightfold\Markup\UIKit\Elements\Simple\SimpleList::class,
        'tableWith' => \Eightfold\Markup\UIKit\Elements\Simple\SimpleTable::class,
        'anchor'    => \Eightfold\Markup\UIKit\Elements\Simple\Anchor::class,
        'glyph'     => \Eightfold\Markup\UIKit\Elements\Simple\Glyph::class,
        'image'     => \Eightfold\Markup\UIKit\Elements\Simple\Image::class,
        // 'button'    => UIKit\Elements\FormControls\Button::class,

        'stripeElements' => \Eightfold\Markup\UIKit\Elements\FormControls\StripeElements::class,
        'hiddenInput'    => \Eightfold\Markup\UIKit\Elements\FormControls\InputHidden::class,
        'fileInput'      => \Eightfold\Markup\UIKit\Elements\FormControls\InputFile::class,
        'textInput'      => \Eightfold\Markup\UIKit\Elements\FormControls\InputText::class,
        // , 'user_card'    => UIKit\Elements\Simple\UserCard::class

        // , 'alert'            => UIKit\Elements\Compound\Alert::class
        'doubleWrap' => \Eightfold\Markup\UIKit\Elements\Compound\DoubleWrap::class,
        'markdown'   => \Eightfold\Markup\UIKit\Elements\Compound\Markdown::class,
        'pagination' => \Eightfold\Markup\UIKit\Elements\Compound\Pagination::class,
        'socialMeta' => \Eightfold\Markup\UIKit\Elements\Compound\SocialMeta::class,
        'webHead'    => \Eightfold\Markup\UIKit\Elements\Compound\WebHead::class,
        'accordion'  => \Eightfold\Markup\UIKit\Elements\Compound\Accordion::class
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
