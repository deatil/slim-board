<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Skg\Board\Gable;
use Skg\Board\Request;
use Skg\Board\Page\Bootstrap as BootstrapPage; 
use App\Model\Reply as ReplyModel;

/**
 * 回复管理
 *
 * @create 2022-7-26
 * @author deatil
 */
class Reply extends Base
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
                "content[~]" => $keyword,
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
                "add_time" => "DESC",
            ],
        ];
        
        $listWhere = array_merge($where, $listWhere);
        
        $list = ReplyModel::getList($listWhere);
        
        $total = ReplyModel::getCount($where);
        
        // 分页页面
        $pageHtml = BootstrapPage::make($limit, (int) $page, $total);
        
        return $this->view($response, 'reply/index.html', [
            'keyword' => $keyword,
            'status' => $status,
            'page' => $page,
            
            'list' => $list,
            'pageHtml' => $pageHtml,
        ]);
    }
    
    /**
     * 编辑
     */
    public function edit($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorHtml($response, "回复 id 错误");
        }
        
        $data = ReplyModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorHtml($response, "回复数据不存在");
        }
        
        return $this->view($response, 'reply/edit.html', [
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
            return $this->errorJson($response, "回复 id 错误");
        }
        
        $data = $request->getParsedBody();
        
        $status = (isset($data['status']) && $data['status'] == 1) ? 1 : 0;
        
        $status = ReplyModel::updateById($id, [
            "status" => $status,
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
            return $this->errorJson($response, "回复 id 错误");
        }
        
        $status = ReplyModel::deleteById($id);
        if (!$status) {
            return $this->errorJson($response, '删除失败');
        }

        return $this->successJson($response, '删除成功');
    }
}