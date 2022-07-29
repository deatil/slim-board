<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Board\Gable;
use App\Board\Request;
use App\Board\Validation;
use App\Model\Board as BoardModel;

/**
 * 分类管理
 *
 * @create 2022-7-26
 * @author deatil
 */
class Board extends Base
{
    /**
     * 列表
     */
    public function index($request, $response, $args)
    {
        $keyword = Request::get($request, "keyword", "");
        $status = Request::get($request, "status", "");
        
        $page = Request::get($request, "page", "1");
        
        $limit = 6;
        $start = ((int) $page - 1) * $limit;
        
        $where = [];
        
        if (! empty($keyword)) {
            $where['AND']['OR'] = [
                "name[~]" => $keyword,
                "slug[~]" => $keyword,
                "desc[~]" => $keyword,
            ];
        }
        if (! empty($status)) {
            $where['AND']['status'] = $status ? 1 : 0;
        }
        
        $list = BoardModel::getList([
            $start, 
            $limit
        ], $where);
        
        return $this->view($response, 'board/index.html', [
            'keyword' => $keyword,
            'status' => $status,
            'page' => $page,
            
            'list' => $list,
        ]);
    }
    
    /**
     * 添加
     */
    public function add($request, $response, $args)
    {
        return $this->view($response, 'board/add.html', []);
    }
    
    /**
     * 添加保存
     */
    public function addSave($request, $response, $args)
    {
        $v = Validation::check($data, [
            ['name', 'required', 'msg' => '名称不能为空'], 
            ['slug', 'required', 'msg' => '标识不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $name = $data['name'] ?? "";
        $slug = $data['slug'] ?? "";
        
        $addIp = Request::ip();
        
        $createId = BoardModel::create([
            "name" => $name,
            "slug" => $slug,
            "add_time" => time(),
            "add_ip" => $addIp,
        ]);
        if (!($createId > 0)) {
            return $this->errorJson($response, '添加失败');
        }
        
        return $this->successJson($response, '添加成功');
    }
    
    /**
     * 编辑
     */
    public function edit($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorHtml($response, "分类 id 错误", url("admin.board.index"));
        }
        
        $data = BoardModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorHtml($response, "分类数据不存在", url("admin.board.index"));
        }
        
        return $this->view($response, 'board/edit.html', [
            'data' => $data,
        ]);
    }
    
    /**
     * 编辑保存
     */
    public function editSave($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "分类 id 错误");
        }
        
        $v = Validation::check($data, [
            ['name', 'required', 'msg' => '名称不能为空'], 
            ['slug', 'required', 'msg' => '标识不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $name = $data['name'] ?? "";
        $slug = $data['slug'] ?? "";
        $desc = $data['desc'] ?? "";
        $sort = $data['sort'] ?? 100;
        $status = isset($data['status']) ? 1 : 0;
        
        $status = BoardModel::updateById($id, [
            "name" => $name,
            "slug" => $slug,
            "desc" => $desc,
            "sort" => $sort,
            "status" => $status,
            "add_time" => time(),
            "add_ip" => $addIp,
        ]);
        if (!$status) {
            return $this->errorJson($response, '编辑失败');
        }
        
        return $this->successJson($response, '编辑成功');
    }
    
    /**
     * 删除
     */
    public function delete($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "分类 id 错误");
        }
        
        $status = BoardModel::deleteById($id);
        if (!$status) {
            return $this->errorJson($response, '删除失败');
        }

        return $this->successJson($response, '删除成功');
    }
}