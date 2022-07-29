<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Board\Gable;
use App\Board\Request;

/**
 * 网站设置
 *
 * @create 2022-7-26
 * @author deatil
 */
class Setting extends Base
{
    /**
     * 列表
     */
    public function index($request, $response, $args)
    {
        return $this->view($response, 'setting/index.html', [
            'name' => $args['name'] ?? ''
        ]);
    }
    
    /**
     * 保存
     */
    public function save($request, $response, $args)
    {
        return $this->successJson($response, '保存成功');
    }
}