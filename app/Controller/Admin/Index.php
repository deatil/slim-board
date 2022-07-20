<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Gable\Gable;
use App\Board\Request;

/**
 * Index
 *
 * @create 2022-7-17
 * @author deatil
 */
class Index extends Base
{
    /**
     * 首页
     */
    public function index($request, $response, $args)
    {
        return $this->view($response, 'index/index.html', [
            'name' => $args['name'] ?? ''
        ]);
    }
    
    /**
     * data
     */
    public function data($request, $response, $args)
    {
        $data = Request::from($args, 'name');
        
        return $this->view($response, 'index/data.html', [
            'name' => $data,
        ]);
    }
}