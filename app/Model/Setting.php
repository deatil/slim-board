<?php

declare(strict_types=1);

namespace App\Model;

use Skg\Board\Orm;

/**
 * 网站设置
 *
 * @create 2022-7-29
 * @author deatil
 */
class Setting
{
    /**
     * 列表
     */
    public static function getList()
    {
        $where = [
            "ORDER" => [
                "key" => "ASC",
            ],
        ];
        
        $data = Orm::select("setting", "*", $where);

        return $data;
    }
    
    /**
     * 列表
     */
    public static function getListByKv()
    {
        $data = static::getList();
        
        $ret = [];
        if (! empty($data)) {
            foreach ($data as $value) {
                $ret[$value['key']] = $value['value'];
            }
        }
        
        return $ret;
    }

    /**
     * 总数
     */
    public static function getCount(array $where = [])
    {
        $data = Orm::count("setting", $where);

        return $data;
    }
    
    /**
     * 更改信息
     */
    public static function updateByKey($key, array $data = [])
    {
        $data = Orm::update("setting", $data, [
            "key[=]" => $key,
        ]);

        return $data;
    }

}