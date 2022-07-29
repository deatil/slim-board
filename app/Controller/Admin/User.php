<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Board\Gable;
use App\Board\Request;

/**
 * 账号管理
 *
 * @create 2022-7-26
 * @author deatil
 */
class User extends Base
{
    /**
     * 列表
     */
    public function index($request, $response, $args)
    {
        return $this->view($response, 'user/index.html', [
            'name' => $args['name'] ?? ''
        ]);
    }
    
    /**
     * 添加
     */
    public function add($request, $response, $args)
    {
        return $this->view($response, 'user/add.html', [
            'name' => "",
        ]);
    }
    
    /**
     * 添加保存
     */
    public function addSave($request, $response, $args)
    {
        return $this->successJson($response, '添加成功');
    }
    
    /**
     * 编辑
     */
    public function edit($request, $response, $args)
    {
        $id = Request::from($args, 'id');
        
        return $this->view($response, 'user/edit.html', [
            'name' => $data,
        ]);
    }
    
    /**
     * 编辑保存
     */
    public function editSave($request, $response, $args)
    {
        return $this->successJson($response, '编辑成功');
    }
    
    /**
     * 删除
     */
    public function delete($request, $response, $args)
    {
        $id = Request::from($args, 'id');
        
        return $this->successJson($response, '删除成功');
    }
}