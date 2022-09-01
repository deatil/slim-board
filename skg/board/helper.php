<?php

use Psr\Http\Message\UriInterface;

use Skg\Board\Gable;
use Skg\Board\Url;
use Skg\Board\Env;

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

if (! function_exists('env')) {
    /**
     * 获取 env 数据
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        return Env::get($key, $default);
    }
}