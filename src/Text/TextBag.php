<?php

namespace Ghosty\Component\Console\Output\Text;

use Ghosty\Component\Bag\AbstractBag;
use Ghosty\Component\Console\Output\Contracts\Text\TextBagContract;
use Ghosty\Component\Console\Output\Contracts\Text\TextContract;
use RuntimeException;

class TextBag extends AbstractBag implements TextBagContract
{
    /**
     * @param Ghosty\Component\Console\Output\Contracts\Text\TextContract[] $items
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item)
        {
            if (!($item instanceof TextContract))
            {
                throw new RuntimeException('$item text must be of type \Ghosty\Component\Console\Output\Contracts\Text\TextContract');
            }
        }

        parent::__construct($items);
    }



    /**
     * @param Ghosty\Component\Console\Output\Contracts\Text\TextContract $text
     */
    public function add(string $key, mixed $text): static
    {
        if (!($text instanceof TextContract))
        {
            throw new RuntimeException('$text text must be of type \Ghosty\Component\Console\Output\Contracts\Text\TextContract');
        }

        return parent::add($key, $text);
    }



    /**
     * @param Ghosty\Component\Console\Output\Contracts\Text\TextContract[] $items
     */
    public function replace(array $items): static
    {
        foreach ($items as $item)
        {
            if (!($item instanceof TextContract))
            {
                throw new RuntimeException('$item text must be of type \Ghosty\Component\Console\Output\Contracts\Text\TextContract');
            }
        }

        return parent::replace($items);
    }

    public function __toString()
    {
        $string = '';
        foreach ($this->all() as $text)
        {
            $string .= $text;
        }

        return $string;
    }
}
