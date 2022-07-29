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
    /**
     * 列表
     */
    public static function getList($limit = [0, 5], array $userWhere = [])
    {
        $where = [
            "LIMIT" => $limit,
            "ORDER" => [
                "add_time" => "DESC",
            ],
        ];
        
        // 合并条件
        $where = array_merge($where, $userWhere);
        
        $data = Orm::select("reply", [], "*", $where);

        return $data;
    }
    
    /**
     * 列表
     */
    public static function getListByTopicId($id, $start = 0, $limit = 5)
    {
        $data = Orm::select("reply", [], "*",, [
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
        $data = Orm::select("reply", [], "*",, [
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