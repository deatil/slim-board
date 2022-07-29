<?php

declare(strict_types=1);

namespace App\Controller\Board;

use App\Board\Gable;
use App\Board\Request;
use App\Board\Validation;
use App\Board\Auth\User as AuthUser;
use App\Board\Auth as BoardAuth;
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
        $data = AuthUser::info();
        
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
        
        $data = [
            'username' => $username,
            'nickname' => $nickname,
            'sign' => $sign,
        ];
        
        $userId = AuthUser::id();
        
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
        
        $userInfo = AuthUser::info();
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
        
        $userId = AuthUser::id();
        
        $status = UserModel::updateById($userId, [
            'password' => $password,
        ]);
        if ($status !== true) {
            return $this->errorJson($response, '更改密码失败');
        }
        
        return $this->successJson($response, '更改密码成功');
    }
}