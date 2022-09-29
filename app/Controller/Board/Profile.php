<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Request;
use Skg\Board\Validation;
use Skg\Board\Auth as BoardAuth;
use App\Model\User as UserModel;

/**
 * 账号信息
 *
 * @create 2022-7-20
 * @author deatil
 */
class Profile extends Base
{
    /**
     * 首页
     */
    public function index($request, $response, $args)
    {
        $this->prepare($request);
        
        $authUser = $request->getAttribute("auth-user");
        
        $data = $authUser->info();
        
        return $this->view($response, 'profile/index.html', [
            'data' => $data,
        ]);
    }
    
    /**
     * 保存信息
     */
    public function save($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['username', 'required', 'msg' => '账号不能为空'], 
            ['username', 'min:3', 'msg' => '账号长度不能小于3个'], 
            ['nickname', 'required', 'msg' => '账号昵称不能为空'], 
            ['nickname', 'min:2', 'msg' => '账号昵称长度不能小于2个'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $username = $data['username'] ?? "";
        $nickname = $data['nickname'] ?? "";
        $sign = $data['sign'] ?? "";
        
        $authUser = $request->getAttribute("auth-user");
        
        // 当前登录账号信息
        $nowUserInfo = $authUser->info();
        
        $userInfo = UserModel::getInfoByUsername($username);
        if (! empty($userInfo) && $nowUserInfo['username'] != $username) {
            return $this->errorJson($response, '账号已被注册');
        }
        
        $data = [
            'username' => $username,
            'nickname' => $nickname,
            'sign' => $sign,
        ];
        
        $userId = $nowUserInfo['id'];
        
        $status = UserModel::updateById($userId, $data);
        if ($status !== true) {
            return $this->errorJson($response, '更新信息失败');
        }
        
        return $this->successJson($response, '更新信息成功');
    }
    
    /**
     * 更改密码
     */
    public function password($request, $response, $args)
    {
        $this->prepare($request);
        
        return $this->view($response, 'profile/password.html', []);
    }
    
    /**
     * 保存密码
     */
    public function passwordSave($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['oldpassword', 'required', 'msg' => '旧密码不能为空'], 
            ['newpassword', 'required', 'msg' => '新密码不能为空'], 
            ['newpassword_check', 'required', 'msg' => '确认新密码不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $oldpassword = $data['oldpassword'] ?? "";
        $newpassword = $data['newpassword'] ?? "";
        $newpassword_check = $data['newpassword_check'] ?? "";

        $authUser = $request->getAttribute("auth-user");
        
        $userInfo = $authUser->info();
        $check = BoardAuth::passwordVerify($oldpassword, $userInfo['password']);
        if (! $check) {
            return $this->errorJson($response, '旧密码错误');
        }
        
        if ($newpassword != $newpassword_check) {
            return $this->errorJson($response, '两次新密码不一致');
        }
        
        if ($newpassword == $oldpassword) {
            return $this->errorJson($response, '新密码与旧密码不能相同');
        }
        
        // 更新的新密码
        $password = BoardAuth::passwordHash($newpassword);
        
        $userId = $authUser->id();
        
        $status = UserModel::updateById($userId, [
            'password' => $password,
        ]);
        if ($status !== true) {
            return $this->errorJson($response, '更改密码失败');
        }
        
        // 更改密码成功后退出登录
        Gable::$di->get("session")->delete('login_auth');
        Gable::$di->get("cookie")->delete('bla');
        
        return $this->successJson($response, '更改密码成功');
    }
    
    /**
     * 更改头像
     */
    public function avatar($request, $response, $args)
    {
        $this->prepare($request);

        $userInfo = $request->getAttribute("auth-user")->info();
        
        return $this->view($response, 'profile/avatar.html', [
            'data' => $userInfo,
        ]);
    }
    
    /**
     * 保存头像
     */
    public function avatarSave($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['avatar', 'required', 'msg' => '更改失败'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }

        $userId = $this->getAuthUser($request)->id();
        
        $status = UserModel::updateById($userId, [
            'avatar' => $data['avatar'],
        ]);
        if ($status !== true) {
            return $this->errorJson($response, '更改失败');
        }
        
        return $this->successJson($response, '更改成功');
    }
}