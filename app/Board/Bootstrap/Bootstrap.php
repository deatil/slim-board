<?php

declare(strict_types=1);

namespace App\Board\Bootstrap;

use App\Board\Gable;

/**
 * 初始化
 *
 * @create 2022-7-15
 * @author deatil
 */
class Bootstrap
{
    /**
     * 初始化
     *
     * @param array $app app
     * @param array $di  容器
     */
    public static function init($app)
    {
        // 容器
        $di = $app->getContainer();
        
        // 设置默认时间时区
        ini_set('date.timezone', 'Asia/Shanghai');

        // 初始化配置
        Module\Config::init($app, $di);
        
        // 初始化 App
        Module\App::init($app, $di);
        
        // 初始化 cookie
        Module\Cookie::init($app, $di);

        // 初始化 Session
        Module\Session::init($app, $di);

        // 初始化 Logger
        Module\Logger::init($app, $di);

        // 初始化 orm
        Module\Orm::init($app, $di);

        // 初始化 View
        Module\View::init($app, $di);
    }
}