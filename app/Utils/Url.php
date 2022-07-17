<?php

declare(strict_types=1);

namespace App\Utils;

use App\Gable\Gable;

/**
 * 路由
 *
 * @create 2022-7-17
 * @author deatil
 */
class Url
{
    /**
     * 生成路由
     *
     * @return string
     */
    public static function to(string $routeName, array $data = [], array $queryParams = []): string
    {
        $routeParser = Gable::$app->getRouteCollector()->getRouteParser();
        
        return $routeParser->urlFor($routeName, $data, $queryParams);
    }
}