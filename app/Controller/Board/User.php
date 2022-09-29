<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Request;

use App\Model\User as UserModel;
use App\Model\Topic as TopicModel;

/**
 * 账号信息
 *
 * @create 2022-9-22
 * @author deatil
 */
class User extends Base
{
    /**
     * 首页
     */
    public function index($request, $response, $args)
    {
        $this->prepare($request);
        
        $username = $args['username'] ?? '';
        if (empty($username)) {
            return $this->errorHtml($response, "账号不存在");
        }
        
        $data = UserModel::getInfoByUsername($username);
        if (empty($data)) {
            return $this->errorHtml($response, "账号不存在");
        }
        
        $where = [
            'AND' => [
                'user_id' => $data['id'],
                'topic.status' => 1,
            ],
            "LIMIT" => [0, 10],
            "ORDER" => [
                "add_time" => "DESC",
            ],
        ];
        
        $topics = TopicModel::getList($where);
        
        return $this->view($response, 'user/index.html', [
            'data' => $data,
            'topics' => $topics,
        ]);
    }
}