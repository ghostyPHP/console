<?php

namespace Ghosty\Component\Console\Output\Text;

use Ghosty\Component\Bag\Bag;
use Ghosty\Component\Console\Output\Color\BackgroundColor;
use Ghosty\Component\Console\Output\Color\TextColor;
use Ghosty\Component\Console\Output\Contracts\Color\BackgroundColorContract;
use Ghosty\Component\Console\Output\Contracts\Color\TextColorContract;
use Ghosty\Component\Console\Output\Contracts\Decoration\DecorationBagContract;
use Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract;
use Ghosty\Component\Console\Output\Contracts\Text\TextContract;
use Ghosty\Component\Console\Output\Decoration\DecorationBag;
use Ghosty\Component\Console\Output\Decoration\TextDecoration;

class Text implements TextContract
{
    private string $text = '';

    private TextColorContract $textColor;

    private BackgroundColorContract $backgroundColor;

    private TextDecorationContract|DecorationBagContract|array $decoration;

    public function __construct(string $text = '', TextColorContract $textColor = new TextColor(), BackgroundColorContract $backgroundColor = new BackgroundColor(), TextDecorationContract|DecorationBagContract|array $textDecoration = new TextDecoration())
    {
        $this->text = $text;
        $this->textColor = $textColor;
        $this->backgroundColor = $backgroundColor;
        $this->decoration = $textDecoration;
    }

    private function prepareColor(string $color)
    {
        return "\e[" . $color . "m";
    }

    private function prepareDecoration(TextDecorationContract|DecorationBagContract|array $decoration)
    {
        if ($decoration instanceof TextDecorationContract)
        {
            return "\e[" . $decoration->getDecoration() . "m";
        }

        if ($decoration instanceof DecorationBagContract)
        {
            $decorationString = "";
            foreach ($decoration->all() as $decorationEl)
            {
                $decorationString .= "\e[" . $decorationEl->getDecoration() . "m";
            }

            return $decorationString;
        }

        if (is_array($decoration))
        {
            $decorationString = "";
            foreach ($decoration as $decorationEl)
            {
                if (!($decorationEl instanceof TextDecorationContract))
                {
                    throw new \RuntimeException("Text decoration must be type of \Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract");
                }

                $decorationString .= "\e[" . $decorationEl->getDecoration() . "m";
            }

            return $decorationString;
        }
    }

    private function prepareText()
    {
        return $this->prepareColor($this->textColor->getColor()) .
            $this->prepareColor($this->backgroundColor->getColor()) .
            $this->prepareDecoration($this->decoration) .
            $this->text .
            "\e[0m";
    }

    public function __toString()
    {
        return $this->prepareText();
    }
}
