<?php

declare(strict_types=1);

namespace App\Model;

use App\Gable\Gable;

/**
 * 用户
 *
 * @create 2022-7-17
 * @author deatil
 */
class User
{
    /**
     * 信息
     */
    public static function getInfoById($id)
    {
        $data = Gable::db()->select("user",  "*", [
            "id[=]" => $id
        ]);

        return $data;
    }
    
    /**
     * 信息
     */
    public static function getInfoByUsername($username)
    {
        $data = Gable::db()->select("user",  "*", [
            "username[=]" => $username,
        ]);

        return $data;
    }
}