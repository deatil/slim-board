<?php

declare(strict_types=1);

namespace App\Model;

use App\Board\Orm;

/**
 * 回复
 *
 * @create 2022-7-29
 * @author deatil
 */
class Reply
{
    // 显示列表数据
    protected static $columns = [
        "reply.id",
        "reply.content",
        "reply.status",
        "reply.add_time",
        "reply.add_ip",

        "topic" => [
            "topic.title",
            "topic.views",
            "topic.replys",
            "topic.last_reply",
        ],

        "user" => [
            "user.username",
            "user.nickname",
            "user.sign",
        ],
    ];
    
    /**
     * 列表
     */
    public static function getList(array $where = [])
    {
        $data = Orm::select("reply", [
            "[>]topic" => ["topic_id" => "id"],
            "[>]user" => ["user_id" => "id"],
        ], static::$columns, $where);

        return $data;
    }
    
    /**
     * 列表
     */
    public static function getListByTopicId($id, $start = 0, $limit = 5)
    {
        $data = Orm::select("reply", [
            "[>]topic" => ["topic_id" => "id"],
            "[>]user" => ["user_id" => "id"],
            "[>]reply" => ["reply_id" => "id"],
        ], static::$columns, [
            "topic_id[=]" => $id,
            "LIMIT" => [
                $start, 
                $limit
            ],
            "ORDER" => [
                "add_time" => "DESC",
            ],
        ]);

        return $data;
    }
    
    /**
     * 列表
     */
    public static function getListByUserId($id, $start = 0, $limit = 5)
    {
        $data = Orm::select("reply", [
            "[>]topic" => ["topic_id" => "id"],
            "[>]user" => ["user_id" => "id"],
            "[>]reply" => ["reply_id" => "id"],
        ], static::$columns, [
            "user_id[=]" => $id,
            "LIMIT" => [
                $start, 
                $limit
            ],
            "ORDER" => [
                "add_time" => "DESC",
            ],
        ]);

        return $data;
    }

    /**
     * 总数
     */
    public static function getCount(array $where = [])
    {
        $data = Orm::count("reply", $where);

        return $data;
    }
    
    /**
     * 信息
     */
    public static function getInfoById($id)
    {
        $data = Orm::get("reply",  "*", [
            "id[=]" => $id
        ]);

        return $data;
    }
    
    /**
     * 更改信息
     */
    public static function updateById($id, array $data = [])
    {
        $data = Orm::update("reply",  $data, [
            "id[=]" => $id,
        ]);

        return $data;
    }
    
    /**
     * 添加数据
     */
    public static function create(array $data = [])
    {
        $ret = Orm::insert("reply", $data);

        return $ret;
    }

    /**
     * 更改信息
     */
    public static function deleteById($id)
    {
        $data = Orm::delete("reply", [
            "AND" => [
                "id[=]" => $id,
            ]
        ]);

        return $data;
    }

}