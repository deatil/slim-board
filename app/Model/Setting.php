<?php

declare(strict_types=1);

namespace App\Model;

use App\Board\Orm;

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
        
        $data = Orm::select("setting", [], "*", $where);

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
            for ($data as $value) {
                $ret[$value['key']] = $value['value'];
            }
        }
        
        return $ret;
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