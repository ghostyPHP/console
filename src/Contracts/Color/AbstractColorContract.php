<?php

namespace Ghosty\Component\Console\Output\Contracts\Color;

interface AbstractColorContract
{
    public function setColor(string $colorName): void;

    public function getColor(): string;
}
