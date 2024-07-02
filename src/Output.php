<?php

namespace Ghosty\Component\Console\Output;

use ArrayObject;
use Ghosty\Component\Console\Output\Contracts\OutputContract;
use Ghosty\Component\Console\Output\Contracts\Text\TextBagContract;

class Output implements OutputContract
{
    private TextBagContract|string|array $text;

    public function __construct(TextBagContract|string|array $text)
    {
        $this->text = $text;
    }

    public function print()
    {
        if ($this->text instanceof TextBagContract)
        {
            foreach ($this->text->all() as $textEl)
            {
                echo $textEl;
                return;
            }
        }

        echo $this->text;
    }

    public static function printStatic(TextBagContract|string|array $text)
    {
        if (is_array($text))
        {
            foreach ($text as $textel)
            {
                echo $textel;
            }

            return;
        }

        echo $text;
    }
}
