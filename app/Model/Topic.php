<?php

declare(strict_types=1);

namespace App\Model;

use App\Board\Orm;

/**
 * 话题
 *
 * @create 2022-7-26
 * @author deatil
 */
class Topic
{
    /**
     * 列表
     */
    public static function getListByBoardId($id, $start = 0, $limit = 5)
    {
        $data = Orm::select("topic", [], "*",, [
            "board_id[=]" => $id,
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
        $data = Orm::select("topic", [], "*",, [
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