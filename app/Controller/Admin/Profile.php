<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Gable\Gable;
use App\Board\Request;
use App\Board\Validation;
use App\Auth\User as AuthUser;
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
        $password = $data['password'] ?? "";
        $sign = $data['sign'] ?? "";
        
        $data = [
            'username' => $username,
            'nickname' => $nickname,
            'sign' => $sign,
        ];
        
        if (! empty($password)) {
            $data['password'] = BoardAuth::passwordHash($password);
        }
        
        $userId = AuthUser::id();
        $count = UserModel::updateById($userId, $data);
        if ($count < 1) {
            return $this->errorJson($response, '更新信息失败');
        }
        
        return $this->successJson($response, '更新信息成功');
    }
}