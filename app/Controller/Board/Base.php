<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Controller as BaseController;

use App\Model\Setting as SettingModel;

/**
 * Base
 *
 * @create 2022-7-18
 * @author deatil
 */
abstract class Base extends BaseController
{
    protected $data = [];
    
    /**
     * 添加数据
     */
    public function assign(array $vars = [])
    {
        $this->data = array_merge($this->data, $vars);
        
        return $this;
    }
    
    /**
     * 预处理
     */
    public function prepare($request)
    {
        $authUser = $request->getAttribute("auth-user");
        $this->data["auth_user"] = $authUser;
        
        $this->data["website_setting"] = SettingModel::getListByKv();;
    }
    
    /**
     * 登录账号信息
     */
    public function getAuthUser($request)
    {
        return $request->getAttribute("auth-user");
    }
    
    /**
     * 登录账号信息
     */
    public function getUser($request)
    {
        return $request->getAttribute("auth-user")->info();
    }
    
    /**
     * 是否为管理员
     */
    public function isAdmin($request)
    {
        return $request->getAttribute("auth-user")->isAdmin();
    }
    
    /**
     * 主题
     */
    public function theme($template)
    {
        $config = Gable::$di->get('config');
        $theme = $config->get("app.board_theme");
        
        return "board/{$theme}/" . ltrim($template, "/");
    }
    
    /**
     * 视图
     */
    public function view($response, $template, $data)
    {
        $data = array_merge($data, $this->data);
        
        return parent::view($response, $template, $data);
    }
}