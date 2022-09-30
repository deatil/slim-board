<?php

declare(strict_types=1);

namespace App\Model;

use Skg\Board\Orm;

/**
 * 回复
 *
 * @create 2022-7-29
 * @author deatil
 */
class Comment
{
    // 显示列表数据
    protected static $columns = [
        "comment.id",
        "comment.content",
        "comment.user_id",
        "comment.is_top",
        "comment.status",
        "comment.add_time",
        "comment.add_ip",

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
        $data = Orm::select("comment", [
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
        $data = Orm::select("comment", [
            "[>]topic" => ["topic_id" => "id"],
            "[>]user" => ["user_id" => "id"],
            "[>]comment" => ["reply_id" => "id"],
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
        $data = Orm::select("comment", [
            "[>]topic" => ["topic_id" => "id"],
            "[>]user" => ["user_id" => "id"],
            "[>]comment" => ["reply_id" => "id"],
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
        $data = Orm::count("comment", $where);

        return $data;
    }
    
    /**
     * 信息
     */
    public static function getInfoById($id)
    {
        $data = Orm::get("comment",  "*", [
            "id[=]" => $id
        ]);

        return $data;
    }
    
    /**
     * 更改信息
     */
    public static function updateById($id, array $data = [])
    {
        $data = Orm::update("comment",  $data, [
            "id[=]" => $id,
        ]);

        return $data;
    }
    
    /**
     * 添加数据
     */
    public static function create(array $data = [])
    {
        $ret = Orm::insert("comment", $data);

        return $ret;
    }

    /**
     * 删除
     */
    public static function deleteById($id)
    {
        $data = Orm::delete("comment", [
            "AND" => [
                "id[=]" => $id,
            ]
        ]);

        return $data;
    }

    /**
     * 删除
     */
    public static function deleteByTopicId($id)
    {
        $data = Orm::delete("comment", [
            "AND" => [
                "topic_id[=]" => $id,
            ]
        ]);

        return $data;
    }

}