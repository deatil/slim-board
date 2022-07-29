<?php

declare(strict_types=1);

namespace App\Board;

use Psr\Http\Message\UriInterface;

use App\Board\Gable;

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
    public static function urlFor(string $routeName, array $data = [], array $queryParams = []): string
    {
        $routeParser = Gable::$app->getRouteCollector()->getRouteParser();
        
        return $routeParser->urlFor($routeName, $data, $queryParams);
    }
    
    /**
     * 生成路由
     *
     * @return string
     */
    public static function fullUrlFor(UriInterface $uri, string $routeName, array $data = [], array $queryParams = []): string
    {
        $routeParser = Gable::$app->getRouteCollector()->getRouteParser();
        
        return $routeParser->fullUrlFor($uri, $routeName, $data, $queryParams);
    }
}