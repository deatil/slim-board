<?php

use App\Gable\Gable;
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
        return Url::to($routeName, $data, $queryParams);
    }
}