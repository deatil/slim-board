<?php

declare(strict_types=1);

namespace App\Route;

use Slim\Routing\RouteCollectorProxy;

use Skg\Board\Gable;
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
        // board 部分
        static::board($app);
        
        // 管理部分
        static::admin($app);
    }
    
    /**
     * board 部分
     *
     * @param array $app app
     */
    protected static function board($app)
    {
        // 账号相关
        $authController = BoardController\Auth::class;
        $app->get('/auth/captcha', [$authController, 'captcha'])->setName('board.auth-captcha');
        $app->get('/auth/login', [$authController, 'login'])->setName('board.auth-login');
        $app->post('/auth/login', [$authController, 'loginCheck'])->setName('board.auth-login-check');
        $app->get('/auth/logout', [$authController, 'logout'])->setName('board.auth-logout');
        $app->get('/auth/register', [$authController, 'register'])->setName('board.auth-register');
        $app->post('/auth/register', [$authController, 'registerCheck'])->setName('board.auth-register-check');
        
        // 登录部分
        $app->group('', function (RouteCollectorProxy $group) {
            // 首页
            $indexController = BoardController\Index::class;
            $group->get('/', [$indexController, 'index'])->setName('board.index');
            
            // 账号信息
            $userController = BoardController\User::class;
            $group->get('/user/{username}', [$userController, 'index'])->setName('board.user-index');
            
            // 话题
            $topicController = BoardController\Topic::class;
            
            // 回复
            $commentController = BoardController\Comment::class;
            
            // 验证登录
            $group->group('', function (RouteCollectorProxy $group) use(
                $topicController,
                $commentController
            ) {
                // 账号信息
                $profileController = BoardController\Profile::class;
                $group->get('/profile', [$profileController, 'index'])->setName('board.profile');
                $group->post('/profile', [$profileController, 'save'])->setName('board.profile-save');
                $group->get('/profile/password', [$profileController, 'password'])->setName('board.profile-password');
                $group->post('/profile/password', [$profileController, 'passwordSave'])->setName('board.profile-password-save');
                $group->get('/profile/avatar', [$profileController, 'avatar'])->setName('board.profile-avatar');
                $group->post('/profile/avatar', [$profileController, 'avatarSave'])->setName('board.profile-avatar-save');
                
                // 话题
                $group->get('/topic/create', [$topicController, 'create'])->setName('board.topic-create');
                $group->post('/topic/create', [$topicController, 'createSave'])->setName('board.topic-create-save');
                $group->get('/topic/update/{id}', [$topicController, 'update'])->setName('board.topic-update');
                $group->post('/topic/update/{id}', [$topicController, 'updateSave'])->setName('board.topic-update-save');
                $group->post('/topic/delete/{id}', [$topicController, 'delete'])->setName('board.topic-delete');
                $group->post('/topic/top/{id}', [$topicController, 'top'])->setName('board.topic-top');
                $group->post('/topic/digest/{id}', [$topicController, 'digest'])->setName('board.topic-digest');
                $group->post('/topic/close/{id}', [$topicController, 'close'])->setName('board.topic-close');
                
                // 回复
                $group->post('/comment/create', [$commentController, 'createSave'])->setName('board.comment-create-save');
                $group->get('/comment/update/{id}', [$commentController, 'update'])->setName('board.comment-update');
                $group->post('/comment/update/{id}', [$commentController, 'updateSave'])->setName('board.comment-update-save');
                $group->post('/comment/delete/{id}', [$commentController, 'delete'])->setName('board.comment-delete');
                
                // 上传
                $uploadController = BoardController\Upload::class;
                $group->post('/up/avatar', [$uploadController, 'avatarSave'])->setName('board.upload-avatar-save');
            })
            ->addMiddleware(new Middleware\CheckLoginMiddleware());
            
            // 回复
            $group->get('/comment/{tid}', [$commentController, 'index'])->setName('board.comment-index');
            
            // 话题
            $group->get('/topics/{slug}', [$topicController, 'index'])->setName('board.topic-index');
            $group->get('/topic/{id}', [$topicController, 'detail'])->setName('board.topic-view');
        })
        ->add(new Middleware\AuthMiddleware());
    }
    
    /**
     * 管理部分
     *
     * @param array $app app
     */
    protected static function admin($app)
    {
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
                
                // 分类管理
                $boardController = AdminController\Board::class;
                $group->get('/board/index', [$boardController, 'index'])->setName('admin.board.index');
                $group->get('/board/add', [$boardController, 'add'])->setName('admin.board.add');
                $group->post('/board/add', [$boardController, 'addSave'])->setName('admin.board.add-save');
                $group->get('/board/edit/{id}', [$boardController, 'edit'])->setName('admin.board.edit');
                $group->post('/board/edit/{id}', [$boardController, 'editSave'])->setName('admin.board.edit-save');
                $group->post('/board/delete/{id}', [$boardController, 'delete'])->setName('admin.board.delete');
                
                // 话题管理
                $topicController = AdminController\Topic::class;
                $group->get('/topic/index', [$topicController, 'index'])->setName('admin.topic.index');
                $group->get('/topic/edit/{id}', [$topicController, 'edit'])->setName('admin.topic.edit');
                $group->post('/topic/edit/{id}', [$topicController, 'editSave'])->setName('admin.topic.edit-save');
                $group->post('/topic/delete/{id}', [$topicController, 'delete'])->setName('admin.topic.delete');
                
                // 回复管理
                $replyController = AdminController\Reply::class;
                $group->get('/reply/index', [$replyController, 'index'])->setName('admin.reply.index');
                $group->get('/reply/edit/{id}', [$replyController, 'edit'])->setName('admin.reply.edit');
                $group->post('/reply/edit/{id}', [$replyController, 'editSave'])->setName('admin.reply.edit-save');
                $group->post('/reply/delete/{id}', [$replyController, 'delete'])->setName('admin.reply.delete');
                
                // 账号管理
                $userController = AdminController\User::class;
                $group->get('/user/index', [$userController, 'index'])->setName('admin.user.index');
                $group->get('/user/add', [$userController, 'add'])->setName('admin.user.add');
                $group->post('/user/add', [$userController, 'addSave'])->setName('admin.user.add-save');
                $group->get('/user/edit/{id}', [$userController, 'edit'])->setName('admin.user.edit');
                $group->post('/user/edit/{id}', [$userController, 'editSave'])->setName('admin.user.edit-save');
                $group->post('/user/delete/{id}', [$userController, 'delete'])->setName('admin.user.delete');
                
                // 网站设置
                $settingController = AdminController\Setting::class;
                $group->get('/setting', [$settingController, 'index'])->setName('admin.setting.index');
                $group->post('/setting', [$settingController, 'save'])->setName('admin.setting.save');
            })->add(new Middleware\AdminAuthMiddleware());
        })
        ->add(new Middleware\AdminCheckMiddleware())
        ->add(new Middleware\AuthMiddleware());
    }
}