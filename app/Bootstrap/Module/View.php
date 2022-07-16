<?php

declare(strict_types=1);

namespace App\Bootstrap\Module;

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

use App\Gable\Gable;

/**
 * View 初始化
 *
 * @create 2022-7-15
 * @author deatil
 */
class View
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
        $di->set('view', function() use($app, $di) {
            $config = $di->get('config');
            
            $path = Gable::basePath($config->get('view.path'));
            $cachePath = Gable::basePath($config->get('view.cache'));
            
            return Twig::create(
                $path, 
                [
                    'cache' => $cachePath,
                ]
            );
        });

        // 添加 Twig-View 中间件
        $app->add(TwigMiddleware::createFromContainer($app));
    }
}