<?php

namespace Eightfold\Markup\UIKit\Elements\Compound;

use Eightfold\HtmlComponent\Component;
use Eightfold\Html\Html;
use Eightfold\UIKit\UIKit;

class Alert
{
    private $title = '';
    private $body = '';

    private $interactive = false;

    private $type = 'info';

    public function __construct(string $title, string $body)
    {
        $this->title = Component::text($title);
        $this->body = $body;
    }

    public function unfold(): string
    {
        $role = 'role alert';
        if ($this->interactive) {
            $role = 'role alertdialog';
        }
        // TODO: Allow classing or styling by user
        return Html::div(
            Html::div(
                  Html::h3($this->title)->attr('class ef-alert-heading')
                , UIKit::markdown($this->body)
            )->attr('class ef-alert-body')
        )->attr($role, 'class ef-alert ef-alert-'. $this->type .' single-centered')
        ->compile();
    }

    public function info()
    {
        $this->type = 'info';
        return $this;
    }

    public function success()
    {
        $this->type = 'success';
        return $this;
    }

    public function warning()
    {
        $this->type = 'warning';
        return $this;
    }

    public function error()
    {
        $this->type = 'error';
        return $this;
    }

    public function interactive()
    {
        $this->interactive = true;
        return $this;
    }
}

