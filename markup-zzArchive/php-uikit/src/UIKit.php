<?php

namespace Eightfold\UIKit;

use Eightfold\Html\Html;

class UIKit extends Html
{
    static public function __callStatic(string $element, array $args)
    {
        $class = '';
        if (array_key_exists($element, self::CLASSES)) {
            $class = self::CLASSES[$element];
        }

        if (strlen($class) == 0) {
            return parent::$element(...$args);
        }

        switch ($element) {
            case ('web_view'):
                $title = $args[0];
                // $bodyContent = $args[1];

                unset($args[0]);
                // unset($args[1]);

                return new $class($title, ...$args);
                break;

            case ('tableWith'
                || 'simpleList'
                || 'primary_nav'
                || 'secondary_nav'
                || 'side_nav'
                || 'user_card'):
                return new $class(...$args);
                break;

            case ('glyph' || 'markdown' || 'head'):
                return new $class($args[0]);
                break;

            case 'footer':
                if (isset($args[1])) {
                    return new $class($args[0], $args[1]);

                }
                return new $class($args[0]);
                break;

            case ('link' || 'alert' || 'button' || 'fileInput' || 'hiddenInput'):
                return new $class($args[0], $args[1]);
                break;

            case 'form' || 'header':
                $methodAction = $args[0];
                unset($args[0]);
                return new $class($methodAction, ...$args);
                break;

            case ('button'
                || 'select'
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

            case 'stripeElements':
                return new $class($args[0], $args[1], $args[2], $args[3]);
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
        'webView'   => Elements\Pages\WebView::class,
        'form'      => Elements\Forms\Form::class,
        'list'  => Elements\Simple\SimpleList::class,
        'tableWith' => Elements\Simple\SimpleTable::class,
        'link'      => Elements\Simple\Link::class,
        'glyph'     => Elements\Simple\Glyph::class,
        // 'button'    => Elements\FormControls\Button::class,

        'stripeElements' => Elements\FormControls\StripeElements::class,
        'hiddenInput'    => Elements\FormControls\InputHidden::class,
        'fileInput'      => Elements\FormControls\InputFile::class,
        'textInput'      => Elements\FormControls\InputText::class
        // , 'user_card'    => Elements\Simple\UserCard::class

        // , 'alert'            => Elements\Compound\Alert::class
        // , 'markdown'         => Elements\Compound\Markdown::class
        // , 'primary_nav'      => Elements\Compound\NavigationPrimary::class
        // , 'secondary_nav'    => Elements\Compound\NavigationSecondary::class
        // , 'side_nav'         => Elements\Compound\NavigationSide::class
        // , 'footer'           => Elements\Compound\Footer::class
        // // , 'head'             => Elements\Compound\Head::class
        // , 'header'           => Elements\Compound\Header::class
        // , 'action_container' => Elements\Compound\ActionContainer::class

        // , 'select'             => Elements\FormControls\Select::class

        // , 'progress'           => Elements\FormControls\Progress::class
        // , 'textarea'           => Elements\FormControls\Textarea::class
        // , 'markdown_textarea'  => Elements\FormControls\TextareaMarkdown::class
        // , 'date_input'         => Elements\FormControls\InputDate::class





    ];
}
