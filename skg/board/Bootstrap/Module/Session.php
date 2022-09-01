<?php

declare(strict_types=1);

namespace Skg\Board\Bootstrap\Module;

use Skg\Board\Gable;

/**
 * Session 初始化
 *
 * @create 2022-7-15
 * @author deatil
 */
class Session
{
    /**
     * 初始化
     *
     * @param object $app app
     * @param object $di  容器
     */
    public static function init($app, $di)
    {
        // session
        // $app->getContainer()->get('session')->get('my_key', 'default');
        // $app->getContainer()->get('session')->set('my_key', 'my_value');
        // $app->getContainer()->get('session')->merge('my_key', ['first' => 'value']);
        // $session->delete('my_key');
        // $session::destroy();
        $di->set('session', function () {
            return new \SlimSession\Helper();
        });

        // 配置
        $config = $di->get('config');
        
        $name = $config->get('session.name');
        $autorefresh = $config->get('session.autorefresh');
        $lifetime = $config->get('session.lifetime');
        $savePath = Gable::basePath($config->get('session.save_path'));
        
        // 添加 session 中间件
        $app->add(
            new \Slim\Middleware\Session([
                'name' => $name,
                'autorefresh' => $autorefresh,
                'lifetime' => $lifetime,
                
                'path' => '/',
                'domain' => '',
                'secure' => false,
                'httponly' => false,
                'samesite' => 'Lax',
                'autorefresh' => false,
                'handler' => null,
                'ini_settings' => [
                    'session.save_path' => $savePath,
                ],
            ])
        );
    }
}