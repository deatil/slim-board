<?php

declare(strict_types=1);

namespace Skg\Board\Bootstrap\Module;

use Medoo\Medoo;

/**
 * Orm 初始化
 *
 * @create 2022-7-15
 * @author deatil
 */
class Orm
{
    /**
     * 初始化
     *
     * @param array $app app
     * @param array $di  容器
     */
    public static function init($app, $di)
    {
        // 创建一个 orm
        $di->set('db', function () use($app, $di) {
            $config = $di->get('config');
            
            $database = new Medoo([
                'type' => $config->get('db.type'),
                'host' => $config->get('db.host'),
                'database' => $config->get('db.database'),
                'username' => $config->get('db.username'),
                'password' => $config->get('db.password'),
                'charset' => $config->get('db.charset', 'utf8mb4'),
                'port'    => $config->get('db.port', 3306),
                'prefix'  => $config->get('db.prefix', ''),
                
                'error'  => $config->get('db.error', ''),
            ]);
            
            $debug = $config->get('db.debug');
            if ($debug) {
                $database->debug();
            }

            return $database;
        });
    }
}