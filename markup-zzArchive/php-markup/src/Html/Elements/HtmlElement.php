<?php

namespace Eightfold\Markup\Html\Elements;

use Eightfold\Markup\Element;

use Eightfold\Markup\Html\Elements\AttributeHandler;

use Eightfold\Markup\Html;

use Eightfold\Markup\Html\Data\Attributes\Ordered;
use Eightfold\Markup\Html\Data\Attributes\Content;
use Eightfold\Markup\Html\Data\Attributes\Aria;
use Eightfold\Markup\Html\Data\Attributes\EventOn;

abstract class HtmlElement extends Element
{
    use AttributeHandler;

    private $is = '';

    public function unfold()
    {
        $prefix = '';

        if ($this->element === 'html') {
            $prefix = '<!doctype html>';
            $this->attr('lang en');
        }

        // $this->attr(...$this->getAttr());

        if (static::shouldOmitEndTag()) {
            $this->omitEndTag();
        }

        $this->orderAttributes($this->attributes);

        // if ($parent = $this->getParent()) {
        //     // Turning this off will show whether the element's contexts are incomplete
        //     // according to the HTML spec.
        //     $notInContexts = ( ! in_array($parent->getElement(), static::contexts()));

        //     // Turning this off will show whether the parent's content model allows
        //     // for the element being generated.
        //     $elemToCheck = (strlen($this->extends) > 0)
        //         ? $this->extends
        //         : $this->element;
        //     $notInContents = ( ! in_array($elemToCheck, $parent::contentModel()));
        //     if  ($notInContexts && $notInContents) {
        //         $prefix .= "\n".
        //             '<!-- `'. $this->getElement() .'`'.
        //             ' says: I do not think I can be a direct descendant of `'.
        //             $parent->getElement() .
        //             '` -->'."\n";

        //     }
        // }

        return $prefix . parent::unfold();
    }

    // public function is(string $is): HtmlElement
    // {
    //     $this->element = $is;
    //     $this->extends = static::elementName();
    //     return $this;
    // }

    protected function getAttr(): array
    {
        $attr = [];
        foreach ($this->attributes as $key => $value) {
            $attr[] = $key .' '. $value;
        }
        return $attr;
    }

    /** HTML specification-related */

    static protected function contentModel(): array
    {
        return [];
    }

    static public function shouldOmitEndTag(): bool
    {
        if (count(static::contentModel()) > 0) {
            return false;
        }
        return true;
    }

    static public function requiredAttributes(): array
    {
        return [];
    }

    static public function optionalAttributes(): array
    {
        return Content::globals();
    }

    static public function deprecatedAttributes(): array
    {
        return Content::deprecated();
    }

    static public function optionalEventAttributes(): array
    {
        return EventOn::globals();
    }

    static public function optionalAriaRoles(): array
    {
        return Aria::globals();
    }

    static public function deprecatedAriaRoles(): array
    {
        return [];
    }

    static public function requiredAriaAttributes(): array
    {
        return [];
    }

    static public function optionalAriaAttributes(): array
    {
        return Aria::globals();
    }

    static public function deprecatedAriaAttributes(): array
    {
        return [];
    }

    static protected function requiredConfigKeys(): array
    {
        return [];
    }

    static public function configKeysToConvertToElements(): array
    {
        return [];
    }

    // static protected function prepare(&$config)
    // {
    //     return;
    // }
}
