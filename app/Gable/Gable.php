<?php

declare(strict_types=1);

namespace App\Gable;

/**
 * 全局变量
 *
 * @create 2022-7-15
 * @author deatil
 */
class Gable
{
    // app 对象
    public static $app;

    // 容器对象
    public static $di;

    // 调试模式
    public static $debug = false;
    
    // 项目根路径
    public static $basePath = '/';
    
    // 配置路径
    public static $configPath = 'data/config';
    
    // 配置后缀
    public static $configExt = '.php';
    
    /**
     * 根目录
     */
    public static function basePath(?string $path = "")
    {
        $p = static::$basePath;
        
        if (! empty($path)) {
            return $p . "/" . $path;
        }
        
        return $p;
    }
    
    /**
     * 配置目录
     */
    public static function configPath(?string $path = "")
    {
        $p = static::basePath(Gable::$configPath);
        
        if (! empty($path)) {
            return $p . "/" . $path;
        }
        
        return $p;
    }
    
    /**
     * 数据目录
     */
    public static function dataPath(?string $path = "")
    {
        $p = static::basePath('data');
        
        if (! empty($path)) {
            return $p . "/" . $path;
        }
        
        return $p;
    }
    
    /**
     * 视图目录
     */
    public static function viewPath(?string $path = "")
    {
        $p = static::dataPath("view");
        
        if (! empty($path)) {
            return $p . "/" . $path;
        }
        
        return $p;
    }

}