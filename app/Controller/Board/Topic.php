<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Request;

use App\Model\Board as BoardModel;
use App\Model\Topic as TopicModel;

/**
 * 话题
 *
 * @create 2022-8-29
 * @author deatil
 */
class Topic extends Base
{
    /**
     * 话题分类列表
     */
    public function index($request, $response, $args)
    {
        return $this->view($response, 'topic/index.html', [
            'name' => $args['name'] ?? ''
        ]);
    }
    
    /**
     * 话题详情
     */
    public function detail($request, $response, $args)
    {
        return $this->view($response, 'topic/view.html', [
            'name' => $args['name'] ?? ''
        ]);
    }
    
    /**
     * 添加话题
     */
    public function create($request, $response, $args)
    {
        return $this->view($response, 'topic/create.html', [
            'name' => $args['name'] ?? ''
        ]);
    }
    
    /**
     * 添加话题保存
     */
    public function createSave($request, $response, $args)
    {
        return $this->successJson($response, '添加话题成功');
    }
    
    /**
     * 编辑话题
     */
    public function update($request, $response, $args)
    {
        return $this->view($response, 'topic/update.html', [
            'name' => $args['name'] ?? ''
        ]);
    }
    
    /**
     * 编辑话题保存
     */
    public function updateSave($request, $response, $args)
    {
        return $this->successJson($response, '编辑话题成功');
    }
    
    /**
     * 删除话题
     */
    public function delete($request, $response, $args)
    {
        return $this->successJson($response, '删除话题成功');
    }
}