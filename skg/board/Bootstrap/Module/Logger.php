<?php

declare(strict_types=1);

namespace Skg\Board\Bootstrap\Module;

use Skg\Board;
use Skg\Board\Gable;

/**
 * Logger 初始化
 *
 * @create 2022-7-16
 * @author deatil
 */
class Logger
{
    /**
     * 初始化
     *
     * @param array $app app
     * @param array $di  容器
     */
    public static function init($app, $di)
    {
        // 日志
        $di->set('logger', function() use($app, $di) {
            $config = $di->get('config');
            
            $name = $config->get('logger.name');
            $path = Gable::basePath($config->get('logger.path'));
            $level = $config->get('logger.level');
            
            $log = Board\Logger::make($name, $path, $level);
            
            return $log;
        });
    }
}