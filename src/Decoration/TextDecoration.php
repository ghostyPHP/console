<?php

namespace Ghosty\Component\Console\Output\Decoration;

use Ghosty\Component\Console\Output\Contracts\Decoration\TextDecoration as DecorationTextDecoration;
use Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract;

class TextDecoration implements TextDecorationContract
{
    private string $decoration = "";

    public const BOLD = "Bold";
    public const DIM = "Dim";
    public const UNDERLINED = "Underlined";
    public const BLINK = "Blink";
    public const REVERSE = "Reverse";
    public const HIDDEN = "Hidden";

    public function __construct(string $decorationName = "default")
    {
        $this->setDecoration($decorationName);
    }

    public function setDecoration(string $decorationName): void
    {
        $this->decoration = $this->getCode(strtolower($decorationName));
    }

    public function getDecoration(): string
    {
        return $this->decoration;
    }

    private function defaultAliases()
    {
        return [
            'default' => '',
            'bold' => '1',
            'dim' => '2',
            'underlined' => '4',
            'blink' => '5',
            'reverse' => '7',
            'hidden' => '8',
        ];
    }


    private function getCode(string $decorationName)
    {
        $decorationAliases = $this->defaultAliases();

        if (!array_key_exists($decorationName, $decorationAliases))
        {
            throw new \RuntimeException("Decoration $decorationName does not exist");
        }

        return $decorationAliases[$decorationName];
    }
}
