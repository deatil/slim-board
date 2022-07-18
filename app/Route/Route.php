<?php

declare(strict_types=1);

namespace App\Route;

use Slim\Routing\RouteCollectorProxy;

use App\Gable\Gable;
use App\Controller;
use App\Middleware;

/**
 * 路由
 *
 * @create 2022-7-15
 * @author deatil
 */
class Route
{
    /**
     * 初始化
     *
     * @param array $app app
     */
    public static function init($app)
    {
        // 首页
        $app->get('/', [Controller\Index::class, 'index'])->setName('board.index');
        $app->get('/data/{name}', [Controller\Index::class, 'data'])->setName('board.index');
        
        // 账号相关
        $app->get('/auth/captcha', [Controller\Auth::class, 'captcha'])->setName('board.auth-captcha');
        $app->get('/auth/login', [Controller\Auth::class, 'login'])->setName('board.auth-login');
        $app->post('/auth/login', [Controller\Auth::class, 'loginCheck'])->setName('board.auth-login-check');
        $app->get('/auth/logout', [Controller\Auth::class, 'logout'])->setName('board.auth-logout');
        
        // 管理分钟
        $app->group('/admin', function (RouteCollectorProxy $group) {
            $group->get('/bar', function ($request, $response, $args) {
                $response
                    ->getBody()
                    ->write("123");
                return $response;
            });
        })->add(new Middleware\AuthMiddleware());
    }
}