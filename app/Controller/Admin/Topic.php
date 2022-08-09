<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Board\Gable;
use App\Board\Request;
use App\Board\Page\Bootstrap as BootstrapPage; 
use App\Model\Topic as TopicModel;
use App\Model\Board as BoardModel;

/**
 * 话题管理
 *
 * @create 2022-7-26
 * @author deatil
 */
class Topic extends Base
{
    /**
     * 列表
     */
    public function index($request, $response, $args)
    {
        $keyword = Request::get($request, "keyword", "");
        
        $isTop = Request::get($request, "is_top", "");
        $isDigest = Request::get($request, "is_digest", "");
        $isClose = Request::get($request, "is_close", "");
        
        $status = Request::get($request, "status", "");

        $page = Request::get($request, "page", "1");
        
        $limit = 10;
        $start = ((int) $page - 1) * $limit;
        
        $where = [];
        
        if (! empty($keyword)) {
            $where['AND']['OR'] = [
                "title[~]" => $keyword,
                "content[~]" => $keyword,
            ];
        }
        
        if (! empty($status)) {
            $where['AND']['status'] = ($status == 1) ? 1 : 0;
        }
        
        if (! empty($isTop)) {
            $where['AND']['is_top'] = ($isTop == 1) ? 1 : 0;
        }
        if (! empty($isDigest)) {
            $where['AND']['is_digest'] = ($isDigest == 1) ? 1 : 0;
        }
        if (! empty($isClose)) {
            $where['AND']['is_close'] = ($isClose == 1) ? 1 : 0;
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
        
        $list = TopicModel::getList($listWhere);
        
        $total = TopicModel::getCount($where);
        
        // 分页页面
        $pageHtml = BootstrapPage::make($limit, (int) $page, $total);
        
        return $this->view($response, 'topic/index.html', [
            'keyword' => $keyword,
            'status' => $status,
            'page' => $page,
            
            'is_top' => $isTop,
            'is_digest' => $isDigest,
            'is_close' => $isClose,
            
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
            return $this->errorHtml($response, "话题 id 错误");
        }
        
        $data = TopicModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorHtml($response, "话题数据不存在");
        }
        
        $boards = BoardModel::getList([
            "ORDER" => [
                "sort" => "DESC",
                "add_time" => "DESC",
            ],
        ]);
        
        return $this->view($response, 'topic/edit.html', [
            'data' => $data,
            'boards' => $boards,
        ]);
    }
    
    /**
     * 编辑保存
     */
    public function editSave($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "话题 id 错误");
        }
        
        $data = $request->getParsedBody();
        
        $boardId = ($data['board_id'] == 1) ? 1 : 0;
        $isTop = ($data['is_top'] == 1) ? 1 : 0;
        $isDigest = ($data['is_digest'] == 1) ? 1 : 0;
        $isClose = ($data['is_close'] == 1) ? 1 : 0;
        $status = ($data['status'] == 1) ? 1 : 0;
        
        if ($boardId <= 0) {
            return $this->errorJson($response, "话题 id 错误");
        }
        
        $status = TopicModel::updateById($id, [
            "board_id" => $boardId,
            "is_top" => $isTop,
            "is_digest" => $isDigest,
            "is_close" => $isClose,
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
            return $this->errorJson($response, "话题 id 错误");
        }
        
        $status = TopicModel::deleteById($id);
        if (!$status) {
            return $this->errorJson($response, '删除失败');
        }

        return $this->successJson($response, '删除成功');
    }
}