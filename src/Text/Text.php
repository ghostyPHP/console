<?php

namespace Ghosty\Component\Console\Output\Text;

use Ghosty\Component\Bag\Bag;
use Ghosty\Component\Console\Output\Color\BackgroundColor;
use Ghosty\Component\Console\Output\Color\TextColor;
use Ghosty\Component\Console\Output\Contracts\Color\BackgroundColorContract;
use Ghosty\Component\Console\Output\Contracts\Color\TextColorContract;
use Ghosty\Component\Console\Output\Contracts\Text\TextContract;

class Text implements TextContract
{
    private string $text = '';

    private TextColorContract $textColor;

    private BackgroundColorContract $backgroundColor;

    public function __construct(string $text = '', TextColorContract $textColor = new TextColor(), BackgroundColorContract $backgroundColor = new BackgroundColor())
    {
        $this->text = $text;
        $this->textColor = $textColor;
        $this->backgroundColor = $backgroundColor;
    }

    private function prepareColor(string $color)
    {
        return "\e[" . $color . "m";
    }

    public function __toString()
    {
        return $this->prepareColor($this->textColor->getColor()) . $this->prepareColor($this->backgroundColor->getColor()) . $this->text . "\e[0m";
    }
}
