<?php

declare(strict_types=1);

namespace App\Board\Twig;

use Twig\RuntimeLoader\RuntimeLoaderInterface;

class TwigRuntimeLoader implements RuntimeLoaderInterface
{
    /**
     * Create the runtime implementation of a Twig element.
     *
     * @param string $class
     *
     * @return mixed
     */
    public function load(string $class)
    {
        if (TwigRuntimeExtension::class === $class) {
            return new $class();
        }

        return null;
    }
}
