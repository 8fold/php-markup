<?php

namespace Eightfold\Html\Data\Attributes;

/**
 * @version 1.0.0
 *
 * Aria attributes
 */
abstract class Aria
{
    static public function globals()
    {
        return array_merge(
            self::globalStates(),
            self::globalProperties()
        );
    }

    static public function globalsExpanded()
    {
        return array_merge(
            self::globals(),
            self::expanded()
        );
    }

    static private function globalProperties()
    {
        return array_merge(
            self::atomic(),
            self::controls(),
            self::describedby(),
            self::dropeffect(),
            self::flowto(),
            self::haspopup(),
            self::label(),
            self::labelledby(),
            self::live(),
            self::owns(),
            self::relevant(),
            self::role()
        );
    }

    static private function globalStates()
    {
        return array_merge(
            self::busy(),
            self::disabled(),
            self::grabbed(),
            self::hidden(),
            self::invalid()
        );
    }

    /** States */
    static public function busy(): array
    {
        return ['aria-busy'];
    }

    static public function disabled(): array
    {
        return ['aria-disabled'];
    }

    static public function grabbed(): array
    {
        return ['aria-grabbed'];
    }

    static public function hidden(): array
    {
        return ['aria-hidden'];
    }

    static public function invalid(): array
    {
        return ['aria-invalid'];
    }

    /** Properties */
    static public function atomic(): array
    {
        return ['aria-atomic'];
    }

    static public function controls(): array
    {
        return ['aria-controls'];
    }

    static public function describedby(): array
    {
        return ['aria-describedby'];
    }

    static public function dropeffect(): array
    {
        return ['aria-dropeffect'];
    }
    static public function flowto(): array
    {
        return ['aria-flowto'];
    }
    static public function haspopup(): array
    {
        return ['aria-haspopup'];
    }

    static public function label(): array
    {
        return ['aria-label'];
    }

    static public function labelledby(): array
    {
        return ['aria-labelledby'];
    }

    static public function live(): array
    {
        return ['aria-live'];
    }

    static public function owns(): array
    {
        return ['aria-owns'];
    }

    static public function relevant(): array
    {
        return ['aria-relevant'];
    }

    static public function role(): array
    {
        return ['role'];
    }
}
