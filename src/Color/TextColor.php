<?php

namespace Ghosty\Component\Console\Output\Color;

use Ghosty\Component\Console\Output\Contracts\Color\TextColorContract;
use Override;

class TextColor extends AbstactColor implements TextColorContract
{
    #[Override]
    protected function defaultAliases()
    {
        return [
            'default' => '39',
            'black' => '30',
            'red' => '31',
            'green' => '32',
            'yellow' => '33',
            'blue' => '34',
            'magneta' => '35',
            'cyan' => '36',
            'light gray' => '37',
            'dark gray' => '90',
            'light red' => '91',
            'light green' => '92',
            'light yellow' => '93',
            'light blue' => '94',
            'light magneta' => '95',
            'light cyan' => '96',
            'white' => '97',
        ];
    }
}
