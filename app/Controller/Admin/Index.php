<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Skg\Board\Gable;
use Skg\Board\Request;

use App\Model\User as UserModel;
use App\Model\Board as BoardModel;
use App\Model\Topic as TopicModel;

/**
 * Index
 *
 * @create 2022-7-17
 * @author deatil
 */
class Index extends Base
{
    /**
     * 首页
     */
    public function index($request, $response, $args)
    {
        $this->prepare($request);
        
        $userTotal = UserModel::getCount([]);
        $boardTotal = BoardModel::getCount([]);
        $topicTotal = TopicModel::getCount([]);
        $newTopicTotal = TopicModel::getCount([
            "add_time[>=]" => strtotime("-7 day"),
        ]);
        
        // 最新话题
        $newTopicList = TopicModel::getList([
            "LIMIT" => [0, 10],
            "ORDER" => [
                "topic.add_time" => "DESC",
            ],
        ]);
        
        // 最新回复话题
        $newReplyTopicList = TopicModel::getList([
            "AND" => [
                "topic.last_reply[!]" => 0,
            ],
            "LIMIT" => [0, 10],
            "ORDER" => [
                "topic.last_reply" => "DESC",
            ],
        ]);
        
        return $this->view($response, 'index/index.html', [
            'userTotal' => number_format($userTotal),
            'boardTotal' => number_format($boardTotal),
            'topicTotal' => number_format($topicTotal),
            'newTopicTotal' => number_format($newTopicTotal),
            
            'newTopicList' => $newTopicList,
            'newReplyTopicList' => $newReplyTopicList,
        ]);
    }
}