<?php

declare(strict_types=1);

namespace App\Model;

use Skg\Board\Orm;

/**
 * 分类
 *
 * @create 2022-7-17
 * @author deatil
 */
class Board
{
    /**
     * 列表
     */
    public static function getList(array $where = [])
    {
        $data = Orm::select("board", "*", $where);

        return $data;
    }

    /**
     * 总数
     */
    public static function getCount(array $where = [])
    {
        $data = Orm::count("board", $where);

        return $data;
    }

    /**
     * 信息
     */
    public static function getInfoById($id)
    {
        $data = Orm::get("board", "*", [
            "id[=]" => $id
        ]);

        return $data;
    }
    
    /**
     * 信息
     */
    public static function getInfoBySlug($slug)
    {
        $data = Orm::get("board", "*", [
            "slug[=]" => $slug
        ]);

        return $data;
    }
    
    /**
     * 更改信息
     */
    public static function updateById($id, array $data = [])
    {
        $ret = Orm::update("board", $data, [
            "id[=]" => $id,
        ]);

        return $ret;
    }
    
    /**
     * 添加数据
     */
    public static function create(array $data = [])
    {
        $ret = Orm::insert("board", $data);

        return $ret;
    }

    /**
     * 删除
     */
    public static function deleteById($id)
    {
        $data = Orm::delete("board", [
            "AND" => [
                "id[=]" => $id,
            ]
        ]);

        return $data;
    }
    
    // ================
    
    /**
     * 添加数据
     */
    public static function createAccess(array $data = [])
    {
        $ret = Orm::insert("board_access", $data);

        return $ret;
    }
    
    /**
     * 更改信息
     */
    public static function updateAccessById($boardId, $userId, $access = '')
    {
        $ret = Orm::update("board_access", [
            "access" => $access,
        ], [
            "board_id[=]" => $boardId,
            "user_id[=]" => $userId,
        ]);

        return $ret;
    }

    /**
     * 删除
     */
    public static function deleteAccessById($boardId, $userId)
    {
        $data = Orm::delete("board_access", [
            "AND" => [
                "board_id[=]" => $boardId,
                "user_id[=]" => $userId,
            ]
        ]);

        return $data;
    }

}