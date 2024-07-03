<?php

namespace Ghosty\Component\Console\Output\Decoration;

use Ghosty\Component\Bag\AbstractBag;
use Ghosty\Component\Console\Output\Contracts\Decoration\DecorationBagContract;
use Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract;

class DecorationBag extends AbstractBag implements DecorationBagContract
{
    /**
     * @param Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract[] $items
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item)
        {
            if (!($item instanceof TextDecorationContract))
            {
                throw new \RuntimeException('$item decoration must be of type \Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract');
            }
        }

        parent::__construct($items);
    }



    /**
     * @param Ghosty\Component\Console\Output\Contracts\Text\TextContract $text
     */
    public function add(string $key, mixed $item): static
    {
        if (!($item instanceof TextDecorationContract))
        {
            throw new \RuntimeException('$item decoration must be of type \Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract');
        }

        return parent::add($key, $item);
    }



    /**
     * @param Ghosty\Component\Console\Output\Contracts\Text\TextContract[] $items
     */
    public function replace(array $items): static
    {
        foreach ($items as $item)
        {
            if (!($item instanceof TextDecorationContract))
            {
                throw new \RuntimeException('$item decoration must be of type \Ghosty\Component\Console\Output\Contracts\Decoration\TextDecorationContract');
            }
        }

        return parent::replace($items);
    }
}
