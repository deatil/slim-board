<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Request;
use Skg\Board\Validation;
use Skg\Board\Page\Bootstrap as BootstrapPage; 

use App\Model\Board as BoardModel;
use App\Model\Topic as TopicModel;
use App\Model\Comment as Comment;
use App\Model\User as UserModel;

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
        $this->prepare($request);
        
        $slug = $args['slug'] ?? '';
        if (empty($slug)) {
            return $this->errorJson($response, "话题分类不存在");
        }
        
        $boardInfo = BoardModel::getInfoBySlug($slug);
        if (empty($boardInfo) || $boardInfo["status"] != 1) {
            return $this->errorJson($response, "话题分类不存在");
        }
        
        $keyword = Request::get($request, "keyword", "");
        
        $isDigest = Request::get($request, "digest", "");
        $isClose = Request::get($request, "close", "");

        $page = Request::get($request, "page", "1");
        
        $limit = 10;
        $start = ((int) $page - 1) * $limit;
        
        $where = [];
        $where['AND']['topic.board_id'] = $boardInfo["id"];
        $where['AND']['topic.status'] = 1;
        
        if (! empty($keyword)) {
            $where['AND']['OR'] = [
                "topic.title[~]" => $keyword,
                "topic.content[~]" => $keyword,
            ];
        }
        
        if (! empty($isDigest)) {
            $where['AND']['topic.is_digest'] = ($isDigest == 1) ? 1 : 0;
        }
        if (! empty($isClose)) {
            $where['AND']['topic.is_close'] = ($isClose == 1) ? 1 : 0;
        }
        
        $listWhere = [
            "LIMIT" => [
                $start, 
                $limit
            ],
            "ORDER" => [
                "topic.is_top" => "DESC",
                "topic.add_time" => "DESC",
            ],
        ];
        
        $listWhere = array_merge($where, $listWhere);
        
        $list = TopicModel::getList($listWhere);
        
        $total = TopicModel::getCount($where);
        
        // 分页页面
        $pageHtml = BootstrapPage::make($limit, (int) $page, $total, false, [
            'path' => $request->getUri()->getPath(),
            'query' => $request->getQueryParams(),
        ]);

        return $this->view($response, 'topic/index.html', [
            'keyword' => $keyword,
            'page' => $page,

            'isDigest' => $isDigest,
            'isClose' => $isClose,
            
            'boardInfo' => $boardInfo,

            'list' => $list,
            'pageHtml' => $pageHtml,
        ]);
    }
    
    /**
     * 话题详情
     */
    public function detail($request, $response, $args)
    {
        $this->prepare($request);
        
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorHtml($response, "话题数据不存在");
        }
        
        $data = TopicModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorHtml($response, "话题数据不存在");
        }
        
        $board = BoardModel::getInfoById($data['board_id']);
        $user = UserModel::getInfoById($data['user_id']);
        
        // 回复列表
        $comments = Comment::getList([
            'AND' => [
                'comment.topic_id' => $id,
                'comment.status' => 1,
            ],
            "LIMIT" => [0, 10],
            "ORDER" => [
                "comment.is_top" => "DESC",
                "comment.add_time" => "ASC",
            ],
        ]);
        $commentTotal = Comment::getCount([
            'AND' => [
                'comment.topic_id' => $id,
                'comment.status' => 1,
            ],
        ]);
        
        // 添加浏览量
        TopicModel::updateById($id, [
            'views[+]' => 1,
        ]);
        
        return $this->view($response, 'topic/detail.html', [
            'data' => $data,
            'board' => $board,
            'user' => $user,
            
            'comments' => $comments,
            'commentTotal' => $commentTotal,
        ]);
    }
    
    /**
     * 添加话题
     */
    public function create($request, $response, $args)
    {
        $this->prepare($request);
        
        $boards = BoardModel::getList([
            "ORDER" => [
                "sort" => "DESC",
                "add_time" => "DESC",
            ],
            "AND" => [
                "status" => 1,
            ],
        ]);
        
        return $this->view($response, 'topic/create.html', [
            'boards' => $boards,
        ]);
    }
    
    /**
     * 添加话题保存
     */
    public function createSave($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['board_id', 'required', 'msg' => '话题分类不能为空'], 
            ['title', 'required', 'msg' => '标题不能为空'], 
            ['title', 'min:3', 'msg' => '标题长度不能小于3个'], 
            ['content', 'required', 'msg' => '话题内容不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $user = $this->getUser($request);
        
        $status = TopicModel::create([
            "board_id" => $data['board_id'],
            "user_id" => $user['id'],
            "title" => $data['title'],
            "content" => $data['content'],
            "add_time" => time(),
            "add_ip" => Request::ip($request),
        ]);
        if (!$status) {
            return $this->errorJson($response, '添加话题失败');
        }
        
        return $this->successJson($response, '添加话题成功');
    }
    
    /**
     * 编辑话题
     */
    public function update($request, $response, $args)
    {
        $this->prepare($request);
        
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorHtml($response, "话题数据不存在");
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
        
        return $this->view($response, 'topic/update.html', [
            'data' => $data,
            'boards' => $boards,
        ]);
    }
    
    /**
     * 编辑话题保存
     */
    public function updateSave($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "话题数据不存在");
        }
        
        $topicData = TopicModel::getInfoById($id);
        if (empty($topicData)) {
            return $this->errorJson($response, "话题数据不存在");
        }
        
        $authUser = $this->getAuthUser($request);
        if (!$authUser->isAdmin() && $authUser->id() != $replyData['user_id']) {
            return $this->errorJson($response, "你不能编辑该话题");
        }

        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['board_id', 'required', 'msg' => '话题分类不能为空'], 
            ['title', 'required', 'msg' => '标题不能为空'], 
            ['title', 'min:3', 'msg' => '标题长度不能小于3个'], 
            ['content', 'required', 'msg' => '话题内容不能为空'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $status = TopicModel::updateById($id, [
            "board_id" => $data['board_id'],
            "title" => $data['title'],
            "content" => $data['content'],
        ]);
        if (!$status) {
            return $this->errorJson($response, '编辑话题失败');
        }

        return $this->successJson($response, '编辑话题成功');
    }
    
    /**
     * 删除话题
     */
    public function delete($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "话题 id 错误");
        }
        
        $data = TopicModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorJson($response, "话题数据不存在");
        }
        
        $authUser = $this->getAuthUser($request);
        if (!$authUser->isAdmin() && $authUser->id() != $data['user_id']) {
            return $this->errorJson($response, "你不能删除该话题");
        }
        
        $status = TopicModel::deleteById($id);
        if (!$status) {
            return $this->errorJson($response, '删除失败');
        }
        
        // 删除回复
        Comment::deleteByTopicId($id);

        return $this->successJson($response, '删除话题成功');
    }
    
    /**
     * 置顶
     */
    public function top($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "话题 id 错误");
        }
        
        $data = $request->getParsedBody();
        $isStatus = $data['status'] ?? 0;
        
        $data = TopicModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorJson($response, "话题数据不存在");
        }
        
        $authUser = $this->getAuthUser($request);
        if (! $authUser->isAdmin()) {
            return $this->errorJson($response, "你不能置顶该话题");
        }
        
        $status = TopicModel::updateById($id, [
            "is_top" => ($isStatus == 1) ? 1 : 0,
        ]);
        if (! $status) {
            return $this->errorJson($response, '设置失败');
        }

        return $this->successJson($response, '设置成功');
    }
    
    /**
     * 精华
     */
    public function digest($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "话题 id 错误");
        }
        
        $data = $request->getParsedBody();
        $isStatus = $data['status'] ?? 0;
        
        $data = TopicModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorJson($response, "话题数据不存在");
        }
        
        $authUser = $this->getAuthUser($request);
        if (! $authUser->isAdmin()) {
            return $this->errorJson($response, "你不能设置该话题为精华帖");
        }
        
        $status = TopicModel::updateById($id, [
            "is_digest" => ($isStatus == "1") ? 1 : 0,
        ]);
        if (! $status) {
            return $this->errorJson($response, '设置失败');
        }

        return $this->successJson($response, '设置成功');
    }
    
    /**
     * 关闭回复
     */
    public function close($request, $response, $args)
    {
        $id = $args['id'] ?? '';
        if (empty($id)) {
            return $this->errorJson($response, "话题 id 错误");
        }
        
        $data = $request->getParsedBody();
        $isStatus = $data['status'] ?? 0;
        
        $data = TopicModel::getInfoById($id);
        if (empty($data)) {
            return $this->errorJson($response, "话题数据不存在");
        }
        
        $authUser = $this->getAuthUser($request);
        if (!$authUser->isAdmin() && $authUser->id() != $data['user_id']) {
            return $this->errorJson($response, "你不能关闭回复");
        }
        
        $status = TopicModel::updateById($id, [
            "is_close" => ($isStatus == "1") ? 1 : 0,
        ]);
        if (! $status) {
            return $this->errorJson($response, '设置失败');
        }

        return $this->successJson($response, '设置成功');
    }
}