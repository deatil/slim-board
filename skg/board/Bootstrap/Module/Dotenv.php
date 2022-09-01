<?php

declare(strict_types=1);

namespace Skg\Board\Bootstrap\Module;

use Dotenv\Dotenv as DotenvLoader;

use Skg\Board\Gable;

/**
 * Dotenv 初始化
 *
 * @create 2022-8-26
 * @author deatil
 */
class Dotenv
{
    /**
     * 初始化
     *
     * @param object $app app
     * @param object $di  容器
     */
    public static function init($app, $di)
    {
        // 导入 env 数据
        $dotenv = DotenvLoader::createImmutable(static::environmentPath(), static::environmentFile());
        $dotenv->safeLoad();
    }

    /**
     * env 路径
     *
     * @return string
     */
    public static function environmentPath()
    {
        return Gable::$basePath;
    }
    
    /**
     * env 文件
     *
     * @return string
     */
    public static function environmentFile()
    {
        return '.env';
    }
}