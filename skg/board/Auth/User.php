<?php

declare(strict_types=1);

namespace Skg\Board\Auth;

use Skg\Board\Gable;
use App\Model\User as UserModel;

/**
 * 账号信息
 *
 * @create 2022-7-19
 * @author deatil
 */
class User
{
    // 账号 id
    protected $id;
    
    // 账号信息
    protected $userInfo;
    
    /**
     * 设置账号 id
     */
    public function withId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * 设置账号信息
     */
    public function withUserInfo($userInfo)
    {
        $this->userInfo = $userInfo;
        
        return $this;
    }
    
    /**
     * 账号 id
     */
    public function id()
    {
        return $this->id;
    }
    
    /**
     * 账号信息
     */
    public function info()
    {
        return $this->userInfo;
    }
    
    /**
     * 账号信息
     */
    public function isLogin()
    {
        if (! empty($this->id) && $this->id > 0) {
            return true;
        }
        
        return false;
    }
    
    /**
     * 是否为管理账号
     */
    public function isActive()
    {
        return (!empty($this->userInfo) && $this->userInfo['status'] == 1);
    }
    
    /**
     * 是否为管理账号
     */
    public function isAdmin()
    {
        $config = Gable::$di->get("config");
        $adminIds = $config->get('auth.admin_ids');
        
        return in_array($this->id, (array) $adminIds);
    }
    
}