<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Skg\Board\Gable;
use Skg\Board\Request;

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
}