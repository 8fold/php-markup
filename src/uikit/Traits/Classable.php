<?php

namespace Eightfold\UIKit\Traits;


trait Classable
{
    /**
     * Resets the class property with the attributes given.
     *
     * @param  [type] $classAttributes [description]
     * @return [type]                  [description]
     */
    // public function class(string ...$classAttributes): self
    // {
    //     $this->classable(true, ...$classAttributes);
    //     return $this;
    // }

    /**
     * Appends the class property with the attributes given.
     *
     * @param [type] $classAttributes [description]
     */
    // public function addClass(string ...$classAttributes): self
    // {
    //     $this->classable(false, ...$classAttributes);
    //     return $this;
    // }

    // private function classable(bool $overwrite, string ...$classAttributes)
    // {
    //     if ($overwrite || ! isset($this->attributes["class"])) {
    //         $this->attributes["class"] = $classAttributes;

    //     } elseif (isset($this->attributes["class"])) {
    //         $this->attributes["class"] =
    //             array_merge($this->attributes["class"], $classAttributes);

    //     } else {
    //         $this->attributes["class"] = $classAttributes;

    //     }
    //     return $this;
    // }

    // public function getAttr(): array
    // {
    //     if (isset($this->attributes["class"]) && is_array($this->attributes["class"])) {
    //         $this->attributes["class"] = implode(" ", $this->attributes["class"]);

    //     }
    //     return parent::getAttr();
    // }
}
