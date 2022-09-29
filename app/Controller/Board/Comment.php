<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Request;
use Skg\Board\Validation;
use Skg\Board\Page\Bootstrap as BootstrapPage; 

use App\Model\Topic as TopicModel;
use App\Model\Reply as ReplyModel;

/**
 * 回复回复
 *
 * @create 2022-9-23
 * @author deatil
 */
class Comment extends Base
{
    /**
     * 回复回复列表
     */
    public function index($request, $response, $args)
    {
        $this->prepare($request);
        
        $tid = $args['tid'] ?? '';
        if (empty($tid)) {
            return $this->errorJson($response, "回复不存在");
        }
        
        $topicInfo = TopicModel::getInfoById($tid);
        if (empty($topicInfo) || $topicInfo["status"] != 1) {
            return $this->errorJson($response, "回复不存在");
        }
        
        $page = Request::get($request, "page", "1");
        
        $limit = 10;
        $start = ((int) $page - 1) * $limit;
        
        $where = [];
        $where['AND']['reply.topic_id'] = $tid;
        $where['AND']['reply.status'] = 1;
        
        $listWhere = [
            "LIMIT" => [
                $start, 
                $limit
            ],
            "ORDER" => [
                "reply.is_top" => "ASC",
                "reply.add_time" => "ASC",
            ],
        ];
        
        $listWhere = array_merge($where, $listWhere);
        
        $list = ReplyModel::getList($listWhere);
        
        $total = ReplyModel::getCount($where);
        
        // 分页页面
        $pageHtml = BootstrapPage::make($limit, (int) $page, $total, false, [
            'path' => $request->getUri()->getPath(),
            'query' => $request->getQueryParams(),
        ]);

        return $this->view($response, 'comment/index.html', [
            'page' => $page,

            'list' => $list,
            'pageHtml' => $pageHtml,
            
            'topicInfo' => $topicInfo,
        ]);
    }
    
    /**
     * 添加回复保存
     */
    public function createSave($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['tid', 'required', 'msg' => '发布失败'], 
            ['comment', 'required', 'msg' => '回复内容不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $user = $this->getUser($request);
        
        $topicInfo = TopicModel::getInfoById($data['tid']);
        if (empty($topicInfo) || $topicInfo["status"] != 1) {
            return $this->errorJson($response, "回复失败，话题不存在");
        }
        
        $status = ReplyModel::create([
            "topic_id" => $data['tid'],
            "reply_id" => $data['reply_id'] ?? 0,
            "user_id" => $user['id'],
            "content" => $data['comment'],
            "add_time" => time(),
            "add_ip" => Request::ip($request),
        ]);
        if (!$status) {
            return $this->errorJson($response, '添加回复失败');
        }
        
        // 更新回复数
        $replyTotal = ReplyModel::getCount([
            'topic_id' => $data['tid'],
        ]);
        TopicModel::updateById($data['tid'], [
            "replys" => $replyTotal,
            "last_reply" => time(),
            "last_user_id" => $user['id'],
        ]);
        
        return $this->successJson($response, '添加回复成功');
    }
    
    /**
     * 编辑回复
     */
    public function update($request, $response, $args)
    {
        $this->prepare($request);
        
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorHtml($response, "回复数据不存在");
        }
        
        $data = ReplyModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorHtml($response, "回复数据不存在");
        }
        
        return $this->view($response, 'comment/update.html', [
            'data' => $data,
        ]);
    }
    
    /**
     * 编辑回复保存
     */
    public function updateSave($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "回复数据不存在");
        }
        
        $replyData = ReplyModel::getInfoById($id);
        if (empty($replyData)) {
            return $this->errorJson($response, "回复数据不存在");
        }
        
        $authUser = $this->getAuthUser($request);
        if (!$authUser->isAdmin() && $authUser->id() != $replyData['user_id']) {
            return $this->errorJson($response, "你不能编辑该回复");
        }

        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['comment', 'required', 'msg' => '回复内容不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $status = ReplyModel::updateById($id, [
            "content" => $data['comment'],
        ]);
        if (!$status) {
            return $this->errorJson($response, '编辑回复失败');
        }

        return $this->successJson($response, '编辑回复成功');
    }
    
    /**
     * 删除回复
     */
    public function delete($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "回复 id 错误");
        }
        
        $data = ReplyModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorJson($response, "回复数据不存在");
        }
        
        $authUser = $this->getAuthUser($request);
        if (!$authUser->isAdmin() && $authUser->id() != $data['user_id']) {
            return $this->errorJson($response, "你不能删除该回复");
        }
        
        $status = ReplyModel::deleteById($id);
        if (! $status) {
            return $this->errorJson($response, '删除回复失败');
        }
        
        // 更新回复数
        $replyTotal = ReplyModel::getCount([
            'topic_id' => $data['topic_id'],
        ]);
        TopicModel::updateById($data['topic_id'], [
            "replys" => $replyTotal,
        ]);

        return $this->successJson($response, '删除回复成功');
    }
}