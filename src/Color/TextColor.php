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
            'lightgray' => '37',
            'darkgray' => '90',
            'lightred' => '91',
            'lightgreen' => '92',
            'lightyellow' => '93',
            'lightblue' => '94',
            'lightmagneta' => '95',
            'lightcyan' => '96',
            'white' => '97',
        ];
    }
}
