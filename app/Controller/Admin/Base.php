<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Skg\Board\Gable;
use Skg\Board\Controller as BaseController;

/**
 * Base
 *
 * @create 2022-7-20
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
    }
    
    /**
     * 主题
     */
    public function theme($template)
    {
        $config = Gable::$di->get('config');
        $theme = $config->get("app.admin_theme");
        
        return "admin/{$theme}/" . ltrim($template, "/");
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