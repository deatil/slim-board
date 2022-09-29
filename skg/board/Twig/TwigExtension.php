<?php

declare(strict_types=1);

namespace Skg\Board\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * 扩展
 *
 * @create 2022-7-18
 * @author deatil
 */
class TwigExtension extends AbstractExtension
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'board';
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('assets', [TwigRuntimeExtension::class, 'assets']),
            new TwigFunction('board_assets', [TwigRuntimeExtension::class, 'boardAssets']),
            new TwigFunction('admin_assets', [TwigRuntimeExtension::class, 'adminAssets']),
            new TwigFunction('avatar_url', [TwigRuntimeExtension::class, 'avatarUrl']),
        ];
    }
}
