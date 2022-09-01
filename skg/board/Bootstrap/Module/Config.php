<?php

declare(strict_types=1);

namespace Skg\Board\Bootstrap\Module;

use Skg\Board;
use Skg\Board\Gable;

/**
 * 配置初始化
 *
 * @create 2022-7-15
 * @author deatil
 */
class Config
{
    /**
     * 初始化
     *
     * @param array $app app
     * @param array $di  容器
     */
    public static function init($app, $di)
    {
        // 视图
        $di->set('config', function() use($app) {
            $configPath = Gable::configPath();
            $configExt = Gable::$configExt;
            
            $files = [];
            if (is_dir($configPath)) {
                $files = glob($configPath . '/*' . $configExt);
            }

            $config = new Board\Config($configPath, $configExt);
            if (count($files) > 0) {
                foreach ($files as $file) {
                    $config->load($file, pathinfo($file, PATHINFO_FILENAME));
                }
            }
            
            return $config;
        });
    }
}