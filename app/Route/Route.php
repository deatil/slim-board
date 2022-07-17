<?php

declare(strict_types=1);

namespace App\Route;

use App\Gable\Gable;
use App\Controller;

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
        $indexController = new Controller\Index();
        $app->get('/hello/{name}', $indexController->index())->setName('profile');
        $app->get('/hi/{name}', $indexController->show());
        
        // 账号相关
        $authController = new Controller\Auth();
        $app->get('/auth/captcha', $authController->captcha())->setName('board.auth-captcha');
        $app->get('/auth/login', $authController->login())->setName('board.auth-login');
        $app->post('/auth/login', $authController->loginCheck())->setName('board.auth-login-check');
        $app->get('/auth/logout', $authController->logout())->setName('board.auth-logout');
    }
}