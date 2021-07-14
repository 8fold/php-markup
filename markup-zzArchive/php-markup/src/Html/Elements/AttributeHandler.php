<?php

namespace Eightfold\Markup\Html\Elements;

use Eightfold\HtmlComponent\Component;

use Eightfold\Markup\Html\Html;

use Eightfold\Markup\Html\Data\Elements;

use Eightfold\Markup\Html\Data\Attributes\Ordered;
use Eightfold\Markup\Html\Data\Attributes\Content;
use Eightfold\Markup\Html\Data\Attributes\Aria;
use Eightfold\Markup\Html\Data\Attributes\EventOn;

trait AttributeHandler
{
    public function orderAttributes(array &$attributes)
    {
        $isKnownElement = $this->isKnownElement($attributes);

        $this->sanitizeRole($attributes);

        // Strip invalid attributes
        if ($isKnownElement) {
            $optionalAttributes = array_merge(
                $this->optionalAttributes(),
                $this->optionalEventAttributes(),
                $this->optionalAriaAttributes()
            );

            $attributes = array_filter($attributes, function($k) use ($optionalAttributes) {
                    return in_array($k, $optionalAttributes);
                }, ARRAY_FILTER_USE_KEY);
        }

        // Strip deprecated attributes
        if ($isKnownElement) {
            $deprecatedAttributes = $this->deprecatedAttributes();
            $attributes = array_filter($attributes, function($k) use ($deprecatedAttributes) {
                    return !in_array($k, $deprecatedAttributes);
                }, ARRAY_FILTER_USE_KEY);
        }

        $booleanAttributes = [];
        self::copyBooleanAttributesToArray($attributes, Content::booleans(), $booleanAttributes);

        $orderedAttributes = [];
        self::copyAttributesToArray($attributes, Ordered::order(), $orderedAttributes);

        $eventHandlers = [];
        if ($isKnownElement) {
            self::copyAttributesToArray($attributes, $this->optionalEventAttributes(), $eventHandlers);
        }

        $ariaAttributes = [];
        if ($isKnownElement) {
            self::copyAttributesToArray($attributes, $this->optionalAriaAttributes(), $ariaAttributes);
        }

        $dataAttributes = [];
        if ($isKnownElement) {
            self::copyDataAttributesToArray($attributes, $dataAttributes);
        }

        $otherAttributes = [];
        if ($isKnownElement) {
            $allOtherAttributes = array_merge($this->requiredAttributes(), $this->optionalAttributes());
            self::copyAttributesToArray($attributes, $allOtherAttributes, $otherAttributes);
        }

        $attributes = array_merge($orderedAttributes, $eventHandlers, $ariaAttributes, $dataAttributes, $otherAttributes, $booleanAttributes);
    }

    private function isKnownElement(array &$attributes)
    {
        if (strlen($this->extends) > 0) {
            return (in_array($this->extends, Elements::all()));
        }
        return (in_array($this->element, Elements::all()));
    }

    private function sanitizeRole(array &$attributes)
    {
        $role = false;
        if (isset($attributes['role'])) {
            $role = $attributes['role'];

        } elseif ( ! $role) {
            return;

        }

        if ( ! in_array($role, static::allAriaRoles()) || $role == $this->defaultAriaRole()) {
            $this->role = '';
            if (isset($attributes['role'])) {
                unset($attributes['role']);
            }
        }
    }

    private function allAriaRoles()
    {
        return array_merge([static::defaultAriaRole()], static::optionalAriaRoles());
    }

    protected function hasAttributes($attributes)
    {
        return (count($attributes) > 0);
    }

    protected function hasAttribute($attributes, $attribute)
    {
        if ($this->hasAttributes($attributes)) {
            return isset($attributes[$attribute]);
        }
        return false;
    }

    private function copyAttributesToArray(array &$attributes, array $source, array &$destination)
    {
        foreach ($source as $attribute) {
            if (!$this->hasAttributes($attributes)) {
                // No more attributes in config, bail
                break;
            }

            if ($this->hasAttribute($attributes, $attribute)) {
                $destination[$attribute] = ($attribute == Content::target()[0])
                    ? '_'. $attributes[$attribute]
                    : $attributes[$attribute];
                unset($attributes[$attribute]);

            }
        }
    }

    private function copyBooleanAttributesToArray(array &$attributes, array $source, array &$destination)
    {
        foreach ($source as $attribute) {
            if (!$this->hasAttributes($attributes)) {
                break;
            }

            if (static::hasAttribute($attributes, $attribute) && $attributes[$attribute]) {
                $destination[$attribute] = $attribute;
                unset($attributes[$attribute]);

            }
        }
    }

    private function copyDataAttributesToArray(array &$attributes, array &$destination)
    {
        if (self::hasAttributes($attributes)) {
            foreach ($attributes as $attribute => $value) {
                if (self::stringStartsWith('data-', $attribute)) {
                    $destination[$attribute] = $attributes[$attribute];
                    unset($attributes[$attribute]);
                }
            }
        }
    }

    static function stringStartsWith($needle, $haystack)
    {
        return ( substr($haystack, 0, strlen($needle)) === $needle );
    }
}
