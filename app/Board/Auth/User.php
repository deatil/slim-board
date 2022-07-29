<?php

declare(strict_types=1);

namespace App\Board\Auth;

use App\Board\Gable;
use App\Model\User as UserModel;

/**
 * 账号信息
 *
 * @create 2022-7-19
 * @author deatil
 */
class User
{
    // 用户 id
    public static $id = '';
    
    // 用户数据
    public static $data = [];
    
    /**
     * 账号 id
     */
    public static function id()
    {
        if (empty(static::$id)) {
            static::$id = Gable::$di->get("session")->get('login_auth');
        }
        
        return static::$id;
    }
    
    /**
     * 账号信息
     */
    public static function info()
    {
        if (! empty(static::$data)) {
            return static::$data;
        }
        
        $id = Gable::$di->get("session")->get('login_auth');
        if (empty($id)) {
            return [];
        }
        
        $userInfo = UserModel::getInfoById($id);
        if (empty($userInfo) || $userInfo['status'] != 1) {
            return [];
        }
        
        static::$data = $userInfo;
        
        return $userInfo;
    }
    
    /**
     * 是否为管理账号
     */
    public static function isAdmin()
    {
        $config = Gable::$di->get("config");
        $adminIds = $config->get('auth.admin_ids');
        
        return in_array(static::id(), (array) $adminIds);
    }
    
}