<?php

declare(strict_types=1);

namespace App\Board\Bootstrap\Module;

use App\Board;

/**
 * Cookie 初始化
 *
 * @create 2022-7-15
 * @author deatil
 */
class Cookie
{
    /**
     * 初始化
     *
     * @param array $app app
     * @param array $di  容器
     */
    public static function init($app, $di)
    {
        // cookie
        $di->set('cookie', function() use($di) {
            $config = $di->get('config');
            
            return Board\Cookie::make([
                'expire'   => $config->get('cookie.expire'),
                'path'     => $config->get('cookie.path'),
                'domain'   => $config->get('cookie.domain'),
                'secure'   => $config->get('cookie.secure'),
                'httponly' => $config->get('cookie.httponly'),
            ]);
        });
    }
}