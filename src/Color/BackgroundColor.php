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
            'light gray' => '47',
            'dark gray' => '100',
            'light red' => '101',
            'light green' => '102',
            'light yellow' => '103',
            'light blue' => '104',
            'light magneta' => '105',
            'light cyan' => '106',
            'white' => '107',
        ];
    }
}
