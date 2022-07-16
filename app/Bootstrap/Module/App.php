<?php

declare(strict_types=1);

namespace App\Bootstrap\Module;

use App\Gable\Gable;

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
        
        Gable::$debug = $config->get('app.debug');
    }
}