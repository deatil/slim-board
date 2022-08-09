<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Board\Auth;
use App\Board\Gable;
use App\Board\Request;
use App\Board\Validation;
use App\Board\Auth\User as AuthUser;
use App\Board\Page\Bootstrap as BootstrapPage; 
use App\Model\User as UserModel;

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
        $keyword = Request::get($request, "keyword", "");
        $status = Request::get($request, "status", "");
        
        $page = Request::get($request, "page", "1");
        
        $limit = 6;
        $start = ((int) $page - 1) * $limit;
        
        $where = [];
        
        if (! empty($keyword)) {
            $where['AND']['OR'] = [
                // like 查询
                "username[~]" => $keyword,
                "nickname[~]" => $keyword,
            ];
        }
        if (! empty($status)) {
            $where['AND']['status'] = $status ? 1 : 0;
        }
        
        $listWhere = [
            "LIMIT" => [
                $start, 
                $limit
            ],
            "ORDER" => [
                "id" => "ASC",
            ],
        ];
        
        $listWhere = array_merge($where, $listWhere);
        
        $list = UserModel::getList($listWhere);
        
        $total = UserModel::getCount($where);
        
        // 分页页面
        $pageHtml = BootstrapPage::make($limit, (int) $page, $total);
        
        return $this->view($response, 'user/index.html', [
            'keyword' => $keyword,
            'status' => $status,
            'page' => $page,
            
            'list' => $list,
            'pageHtml' => $pageHtml,
        ]);

    }
    
    /**
     * 添加
     */
    public function add($request, $response, $args)
    {
        return $this->view($response, 'user/add.html', []);
    }
    
    /**
     * 添加保存
     */
    public function addSave($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['username', 'required', 'msg' => '账号名称不能为空'], 
            ['nickname', 'required', 'msg' => '账号昵称不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $username = $data['username'] ?? "";
        $nickname = $data['nickname'] ?? "";
        
        $addIp = Request::ip($request);
        
        $info = UserModel::getInfoByUsername($username);
        if (! empty($info)) {
            return $this->errorJson($response, "账号名称已经存在");
        }
        
        $createId = UserModel::create([
            "username" => $username,
            "nickname" => $nickname,
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
            return $this->errorHtml($response, "账号 id 错误");
        }
        
        $data = UserModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorHtml($response, "账号数据不存在");
        }
        
        return $this->view($response, 'user/edit.html', [
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
            return $this->errorJson($response, "账号 id 错误");
        }
        
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['username', 'required', 'msg' => '账号名称不能为空'], 
            ['nickname', 'required', 'msg' => '账号昵称不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        if (AuthUser::id() == $id) {
            return $this->errorJson($response, "你不能修改自己的账号");
        }
        
        $username = $data['username'] ?? "";
        $nickname = $data['nickname'] ?? "";
        $password = $data['password'] ?? "";
        $sign = $data['sign'] ?? "";
        $avatarDelete = (isset($data['avatar_delete']) && $data['avatar_delete'] == 1) ? 1 : 0;
        $status = (isset($data['status']) && $data['status'] == 1) ? 1 : 0;
        
        $info = UserModel::getInfoByUsername($username);
        if (! empty($info) && $info['id'] != $id) {
            return $this->errorJson($response, "账号名称已经存在");
        }
        
        $updateData = [
            "username" => $username,
            "nickname" => $nickname,
            "sign" => $sign,
            "status" => $status,
        ];
        if (! empty($password)) {
            $updateData['password'] = Auth::passwordHash($password);
        }
        
        // 清空头像
        if ($avatarDelete == 1) {
            $updateData['avatar'] = '';
        }
        
        $status = UserModel::updateById($id, $updateData);
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
            return $this->errorJson($response, "账号 id 错误");
        }
        
        $status = UserModel::deleteById($id);
        if (!$status) {
            return $this->errorJson($response, '删除失败');
        }

        return $this->successJson($response, '删除成功');
    }
}