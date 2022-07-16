<?php

declare(strict_types=1);

namespace App\Route;

use App\Gable\Gable;

/**
 * 路由
 *
 * @create 2022-7-15
 * @author deatil
 */
class Route
{
    /**
     * 初始化
     *
     * @param array $app app
     */
    public static function init($app)
    {
        // Define named route
        $app->get('/hello/{name}', function ($request, $response, $args) {
            Gable::$di->get("logger")->info('info');
            
            return $this->get('view')->render($response, 'profile.html', [
                'name' => $args['name']
            ]);
        })->setName('profile');

        // Render from string
        $app->get('/hi/{name}', function ($request, $response, $args) {
            $str = $this->get('view')->fetchFromString(
                '<p>Hi, my name is {{ name }}.</p>',
                [
                    'name' => $args['name']
                ]
            );
            $response->getBody()->write($str);
            return $response;
        });
    }
}