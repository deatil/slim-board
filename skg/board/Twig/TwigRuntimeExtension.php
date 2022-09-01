<?php

declare(strict_types=1);

namespace Skg\Board\Twig;

use Skg\Board\Gable;
use Skg\Board\Auth\User;

/**
 * 扩展
 *
 * @create 2022-7-18
 * @author deatil
 */
class TwigRuntimeExtension
{
    /**
     * 账号信息
     */
    public function user(): array
    {
        return User::info();
    }

    /**
     * 账号是否为管理
     */
    public function isAdmin(): bool
    {
        return User::isAdmin();
    }

    /**
     * 账号是否登录
     */
    public function isLogin(): bool
    {
        return User::id() > 0;
    }

    /**
     * 静态文件根目录
     */
    public function assets(string $path): string
    {
        $config = Gable::$di->get('config');
        
        $p = $config->get("view.assets", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }

    /**
     * 静态文件根目录
     */
    public function boardAssets(string $path): string
    {
        $config = Gable::$di->get('config');
        
        $p = $config->get("view.board_assets", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }

    /**
     * 静态文件根目录
     */
    public function adminAssets(string $path): string
    {
        $config = Gable::$di->get('config');
        
        $p = $config->get("view.admin_assets", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }

    /**
     * 头像链接
     */
    public function avatarUrl(?string $path): string
    {
        $config = Gable::$di->get('config');
        
        $defaultAvatar = $config->get("view.avatar_default", "");
        if (empty($path)) {
            return $defaultAvatar;
        }
        
        $p = $config->get("view.avatar_url", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }

}
