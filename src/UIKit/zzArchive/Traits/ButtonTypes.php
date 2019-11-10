<?php

namespace Eightfold\Markup\UIKit\Traits;

trait ButtonTypes
{
    protected $type = 'primary';

    public function type(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function secondary()
    {
        return $this->type($secondary);
    }

    public function destructive()
    {
        return $this->type('destructive');
    }
}
