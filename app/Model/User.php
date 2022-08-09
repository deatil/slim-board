<?php

declare(strict_types=1);

namespace App\Model;

use App\Board\Orm;

/**
 * 用户
 *
 * @create 2022-7-17
 * @author deatil
 */
class User
{
    /**
     * 列表
     */
    public static function getList(array $where = [])
    {
        $data = Orm::select("user", "*", $where);

        return $data;
    }

    /**
     * 总数
     */
    public static function getCount(array $where = [])
    {
        $data = Orm::count("user", $where);

        return $data;
    }

    /**
     * 信息
     */
    public static function getInfoById($id)
    {
        $data = Orm::get("user",  "*", [
            "id[=]" => $id
        ]);

        return $data;
    }
    
    /**
     * 信息
     */
    public static function getInfoByUsername($username)
    {
        $data = Orm::get("user",  "*", [
            "username[=]" => $username,
        ]);

        return $data;
    }
    
    /**
     * 更改信息
     */
    public static function updateById($id, array $data = [])
    {
        $data = Orm::update("user",  $data, [
            "id[=]" => $id,
        ]);

        return $data;
    }
    
    /**
     * 添加数据
     */
    public static function create(array $data = [])
    {
        $ret = Orm::insert("user", $data);

        return $ret;
    }

    /**
     * 更改信息
     */
    public static function deleteById($id)
    {
        $data = Orm::delete("user", [
            "AND" => [
                "id[=]" => $id,
            ]
        ]);

        return $data;
    }

}