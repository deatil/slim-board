<?php

declare(strict_types=1);

namespace App\Board\Bootstrap\Module;

use App\Board\Gable;

/**
 * App
 *
 * @create 2022-7-15
 * @author deatil
 */
class App
{
    /**
     * 初始化
     *
     * @param array $app app
     * @param array $di  容器
     */
    public static function init($app, $di)
    {
        $config = $di->get('config');
        
        // 保存全局变量
        Gable::$app = $app;
        Gable::$di = $di;
        
        // 调试
        Gable::$debug = $config->get('app.debug');
        
        // 设置时间时区
        $timezone = $config->get('app.timezone');
        ini_set('date.timezone', $timezone);
    }
}