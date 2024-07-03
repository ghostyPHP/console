<?php

namespace Ghosty\Component\Console\Output\Color;

use Ghosty\Component\Console\Output\Contracts\Color\BackgroundColorContract;
use Override;

class BackgroundColor extends AbstactColor implements BackgroundColorContract
{
    #[Override]
    protected function defaultAliases()
    {
        return [
            'default' => '49',
            'black' => '40',
            'red' => '41',
            'green' => '42',
            'yellow' => '43',
            'blue' => '44',
            'magneta' => '45',
            'cyan' => '46',
            'lightgray' => '47',
            'darkgray' => '100',
            'lightred' => '101',
            'lightgreen' => '102',
            'lightyellow' => '103',
            'lightblue' => '104',
            'lightmagneta' => '105',
            'lightcyan' => '106',
            'white' => '107',
        ];
    }
}
