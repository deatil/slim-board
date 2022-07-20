<?php

declare(strict_types=1);

namespace App\Route;

use Slim\Routing\RouteCollectorProxy;

use App\Gable\Gable;
use App\Middleware;
use App\Controller\Board as BoardController;
use App\Controller\Admin as AdminController;

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
        $indexController = BoardController\Index::class;
        $app->get('/', [$indexController, 'index'])->setName('board.index');
        
        // 账号相关
        $authController = BoardController\Auth::class;
        $app->get('/auth/captcha', [$authController, 'captcha'])->setName('board.auth-captcha');
        $app->get('/auth/login', [$authController, 'login'])->setName('board.auth-login');
        $app->post('/auth/login', [$authController, 'loginCheck'])->setName('board.auth-login-check');
        $app->get('/auth/logout', [$authController, 'logout'])->setName('board.auth-logout');
        
        // 管理分钟
        $app->group('/admin', function (RouteCollectorProxy $group) {
            // 登录
            $authController = AdminController\Auth::class;
            $group->get('/auth/captcha', [$authController, 'captcha'])->setName('admin.auth-captcha');
            $group->get('/auth/login', [$authController, 'login'])->setName('admin.auth-login');
            $group->post('/auth/login', [$authController, 'loginCheck'])->setName('admin.auth-login-check');
            $group->get('/auth/logout', [$authController, 'logout'])->setName('admin.auth-logout');
            
            $group->group('', function (RouteCollectorProxy $group) {
                // 首页
                $indexController = AdminController\Index::class;
                $group->get('/index', [$indexController, 'index'])->setName('admin.index');
                $group->get('/data/{name}', [$indexController, 'data'])->setName('admin.data');
                
                // 账号信息
                $profileController = AdminController\Profile::class;
                $group->get('/profile', [$profileController, 'index'])->setName('admin.profile');
                $group->post('/profile', [$profileController, 'save'])->setName('admin.profile-save');
            })->add(new Middleware\AdminAuthMiddleware());
        })
        ->add(new Middleware\AuthMiddleware())
        ->add(new Middleware\AdminCheckMiddleware());
    }
}