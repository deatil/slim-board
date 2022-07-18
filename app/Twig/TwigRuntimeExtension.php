<?php

declare(strict_types=1);

namespace App\Twig;

use App\Gable\Gable;

/**
 * 扩展
 *
 * @create 2022-7-18
 * @author deatil
 */
class TwigRuntimeExtension
{
    // 静态文件根目录
    public function assets(string $path): string
    {
        $config = Gable::$di->get('config');
        
        $p = $config->get("view.assets", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }

    // 静态文件根目录
    public function adminAssets(string $path): string
    {
        $config = Gable::$di->get('config');
        
        $p = $config->get("view.admin_assets", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }

}
