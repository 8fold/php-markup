<?php

namespace Eightfold\UIKit\Elements\Compound;

use Eightfold\Html\Elements\HtmlElement;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

/**
 * Alert
 *
 * The alert is a good example of a nuanced component.
 *
 * The primary nuance is that there is no "alert" element in the HTML specification.
 * For sighted people, this is easily accomplished through aesthetics. However, for the
 * visually impaired who use screen readers to see the screen, this is not helpful.
 * Therefore, The [US Web Design system](https://standards.usa.gov/components/alerts/)
 * recommends adding an explicit ARIA `role="alert"` to the element.
 *
 * The secondary nuance is the choice of the `div` element to implement the alert
 * component. Under normal circumstances, semantic web developers want to *avoid* the
 * `div` element whenever possible because [it doesn't mean anything](https://www.w3.org/TR/html5/grouping-content.html#the-div-element).
 * And, you might think that an `aside` might make more sense for an alert. This
 * purpose does fit within the [definition for the `aside`](https://www.w3.org/TR/html5/sections.html#the-aside-element); however, it cannot receive
 * the desired ARIA role. In fact, none of the [section elements](https://www.w3.org/TR/html5/sections.html) will work; neither
 * semantically nor with the ability to receive the role. You might consider the
 * [`blockquote` element](https://www.w3.org/TR/html5/grouping-content.html#the-blockquote-element); however, by definition, an alert is
 * not the proper usage of that element.
 *
 * Therefore, through a process of elimination, the `div` is the only element that can
 * satisfy both the definition of an alert and receive the ARIA role you want.
 *
 * The tertiary nuance is that if the content of the alert contains interactive
 * elements, you should use the `alertdialog` role instead.
 *
 * Required keys
 *
 * - **title:** The main headline for the alert.
 * - **body:** The body text of the alert. (HTML string.)
 * - **interactive:** true|false Whether to use "alertdialog" or "alert" for the ARIA
 *   role, respectively.
 *
 * Optional keys
 *
 * - **type:** info|success|warning|error (Default is info.) What type of alert to
 *   display to the user.
 *
 *
 * UIKit::alert([
 *     'title',
 *     'body'
 * ])->isInteractive()
 */
class Alert extends HtmlElement
{
    private $title = '';
    private $body = '';

    private $_interactive = false;

    private $_type = 'info';

    public function __construct(string $title, string $body)
    {
        $this->title = Component::text($title);
        $this->body = $body;
    }

    public function compile(string ...$attributes): string
    {
        $role = 'role alert';
        if ($this->_interactive) {
            $role = 'role alertdialog';
        }

        return Html::div(
            Html::div(
                  Html::h3($this->title)->attr('class ef-alert-heading')
                , UIKit::markdown($this->body)
            )->attr('class ef-alert-body')
        )->attr($role, 'class ef-alert ef-alert-'. $this->_type .' single-centered')
        ->compile();
    }

    public function info()
    {
        $this->_type = 'info';
        return $this;
    }

    public function success()
    {
        $this->_type = 'success';
        return $this;
    }

    public function warning()
    {
        $this->_type = 'warning';
        return $this;
    }

    public function error()
    {
        $this->_type = 'error';
        return $this;
    }

    public function interactive()
    {
        $this->_interactive = true;
        return $this;
    }
}

