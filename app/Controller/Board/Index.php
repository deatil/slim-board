<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Request;

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
        
        $newTopics = TopicModel::getList([
            'AND' => [
                'topic.status[=]' => 1,
            ],
            "LIMIT" => [0, 10],
            "ORDER" => [
                "topic.add_time" => "DESC",
            ],
        ]);
        
        // 最新回复话题
        $newReplyTopics = TopicModel::getList([
            "AND" => [
                "topic.last_reply[!]" => 0,
            ],
            "LIMIT" => [0, 10],
            "ORDER" => [
                "topic.last_reply" => "DESC",
            ],
        ]);
        
        return $this->view($response, 'index/index.html', [
            'newTopics' => $newTopics,
            'newReplyTopics' => $newReplyTopics,
        ]);
    }
}