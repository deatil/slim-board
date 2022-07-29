<?php

declare(strict_types=1);

namespace App\Board\Bootstrap\Module;

use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

use App\Board\Gable;
use App\Board\Twig\TwigExtension;
use App\Board\Twig\TwigRuntimeLoader;

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
            
            $twig = Twig::create(
                $path, 
                [
                    'debug' => $config->get('view.debug'),
                    'charset' => $config->get('view.charset'),
                    'strict_variables' => $config->get('view.strict_variables'),
                    'autoescape' => $config->get('view.autoescape'),
                    'cache' => $cachePath,
                    'auto_reload' => $config->get('view.auto_reload'),
                    'optimizations' => $config->get('view.optimizations'),
                ]
            );
            
            // 导入器，必须
            $runtimeLoader = new TwigRuntimeLoader();
            $twig->addRuntimeLoader($runtimeLoader);
            
            // 扩展函数，必须
            $extension = new TwigExtension();
            $twig->addExtension($extension);
            
            return $twig;
        });

        // 添加 Twig-View 中间件
        $app->add(TwigMiddleware::createFromContainer($app), "view");
    }
}