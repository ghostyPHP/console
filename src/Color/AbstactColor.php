<?php

namespace Ghosty\Component\Console\Output\Color;

use Ghosty\Component\Console\Output\Contracts\Color\AbstractColorContract;
use RuntimeException;

abstract class AbstactColor implements AbstractColorContract
{
    protected string $color = "";

    public const Default = "Default";
    public const Black = "Black";
    public const Red = "Red";
    public const Green = "Green";
    public const Yellow = "Yellow";
    public const Blue = "Blue";
    public const Magneta = "Magneta";
    public const Cyan = "Cyan";
    public const LightGray = "LightGray";
    public const DarkGray = "DarkGray";
    public const LightRed = "LightRed";
    public const LightGreen = "LightGreen";
    public const LightYellow = "LightYellow";
    public const LightBlue = "LightBlue";
    public const LightMagneta = "LightMagneta";
    public const LightCyan = "LightCyan";
    public const White = "White";


    public function __construct(string $colorName = 'default')
    {
        $this->setColor($colorName);
    }

    public function setColor(string $colorName): void
    {
        $this->color = $this->getCode(strtolower($colorName));
    }

    public function getColor(): string
    {
        return $this->color;
    }

    protected function defaultAliases()
    {
        throw new RuntimeException("Color does not implement defaultAliases method.");
    }

    private function getCode(string $colorName)
    {
        $colorAliases = $this->defaultAliases();

        if (!array_key_exists($colorName, $colorAliases))
        {
            throw new RuntimeException("Color $colorName does not exist");
        }

        return $colorAliases[$colorName];
    }
}
