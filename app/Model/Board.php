<?php

declare(strict_types=1);

namespace App\Model;

use App\Gable\Gable;

/**
 * 分类
 *
 * @create 2022-7-17
 * @author deatil
 */
class Board
{
    /**
     * 首页
     */
    public function allByOpen()
    {
        $data = Gable::db()->select("board",  "*", [
            "status[=]" => 1
        ]);

        return $data;
    }
}