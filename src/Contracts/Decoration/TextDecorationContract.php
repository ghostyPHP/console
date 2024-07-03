<?php

namespace Ghosty\Component\Console\Output\Contracts\Decoration;

interface TextDecorationContract
{
    public function __construct(string $decoration = "default");

    public function setDecoration(string $decoration): void;

    public function getDecoration(): string;
}
