<?php

declare(strict_types=1);

namespace App\Model;

use Skg\Board\Orm;

/**
 * 话题
 *
 * @create 2022-7-26
 * @author deatil
 */
class Topic
{
    // 显示列表数据
    protected static $columns = [
        "topic.id",
        "topic.title",
        "topic.views",
        "topic.replys",
        "topic.is_top",
        "topic.is_digest",
        "topic.is_close",
        "topic.status",
        "topic.last_reply",
        "topic.add_time",
        "topic.add_ip",

        "board" => [
            "board.name",
            "board.slug",
            "board.desc",
        ],

        "user" => [
            "user.id(uid)",
            "user.username",
            "user.nickname",
            "user.sign",
        ],

        "last_user" => [
            "last_user.id(last_uid)",
            "last_user.username(last_username)",
            "last_user.nickname(last_nickname)",
            "last_user.sign(last_sign)",
        ]
    ];
    
    /**
     * 列表
     */
    public static function getList(array $where = [])
    {
        $data = Orm::select("topic", [
            "[>]board" => ["board_id" => "id"],
            "[>]user" => ["user_id" => "id"],
            "[>]user(last_user)" => ["last_user_id" => "id"],
        ], static::$columns, $where);

        return $data;
    }

    /**
     * 列表
     */
    public static function getListByBoardId($id, array $userWhere = [])
    {
        $where = [
            "board_id[=]" => $id,
        ];
        
        // 合并条件
        $where = array_merge($where, $userWhere);
        
        $data = Orm::select("topic", [
            "[>]board" => ["board_id" => "id"],
            "[>]user" => ["user_id" => "id"],
            "[>]user(last_user)" => ["last_user_id" => "id"],
        ], static::$columns, $where);

        return $data;
    }
    
    /**
     * 列表
     */
    public static function getListByUserId($id, array $userWhere = [])
    {
        $where = [
            "user_id[=]" => $id,
        ];
        
        // 合并条件
        $where = array_merge($where, $userWhere);
        
        $data = Orm::select("topic", [
            "[>]board" => ["board_id" => "id"],
            "[>]user" => ["user_id" => "id"],
            "[>]user(last_user)" => ["last_user_id" => "id"],
        ], static::$columns, $where);

        return $data;
    }

    /**
     * 总数
     */
    public static function getCount(array $where = [])
    {
        $data = Orm::count("topic", $where);

        return $data;
    }
    
    /**
     * 信息
     */
    public static function getInfoById($id)
    {
        $data = Orm::get("topic", "*", [
            "id[=]" => $id
        ]);

        return $data;
    }
    
    /**
     * 更改信息
     */
    public static function updateById($id, array $data = [])
    {
        $data = Orm::update("topic", $data, [
            "id[=]" => $id,
        ]);

        return $data;
    }
    
    /**
     * 添加数据
     */
    public static function create(array $data = [])
    {
        $ret = Orm::insert("topic", $data);

        return $ret;
    }

    /**
     * 更改信息
     */
    public static function deleteById($id)
    {
        $data = Orm::delete("topic", [
            "AND" => [
                "id[=]" => $id,
            ]
        ]);

        return $data;
    }
}