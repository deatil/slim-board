<?php

use Psr\Http\Message\UriInterface;

use App\Board\Gable;
use App\Board\Url;

if (! function_exists('app')) {
    // app
    function app() 
    {
        return Gable::$app;
    }
}

if (! function_exists('di')) {
    // 容器
    function di() 
    {
        return Gable::$di;
    }
}

if (! function_exists('url')) {
    // 路由
    function url(string $routeName, array $data = [], array $queryParams = []) 
    {
        return Url::urlFor($routeName, $data, $queryParams);
    }
}

if (! function_exists('full_url')) {
    // 路由
    function full_url(UriInterface $uri, string $routeName, array $data = [], array $queryParams = []) 
    {
        return Url::fullUrlFor($uri, $routeName, $data, $queryParams);
    }
}