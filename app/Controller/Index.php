<?php

declare(strict_types=1);

namespace App\Controller;

use App\Gable\Gable;

/**
 * Index
 *
 * @create 2022-7-17
 * @author deatil
 */
class Index
{
    /**
     * 首页
     */
    public function index()
    {
        return function($request, $response, $args) {
            Gable::$di->get("logger")->info('info');
            
            return $this->get('view')->render($response, 'profile.html', [
                'name' => $args['name']
            ]);
        };
    }
    
    /**
     * 详情
     */
    public function show()
    {
        return function($request, $response, $args) {
            $str = $this->get('view')->fetchFromString(
                '<p>Hi, my name is {{ name }}.</p>',
                [
                    'name' => $args['name']
                ]
            );
            
            $response->getBody()->write($str);
            return $response;
        };
    }
}