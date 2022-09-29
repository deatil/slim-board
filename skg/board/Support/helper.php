<?php

use Psr\Http\Message\UriInterface;

use Skg\Board\Gable;
use Skg\Board\Url;
use Skg\Board\Env;

/**
 * 生成16位md5
 */
if (! function_exists('md5_16')) {
    function md5_16($str) {
        return substr(md5($str), 8, 16);
    }
}

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

if (! function_exists('config')) {
    // 配置
    function config(?string $name = null, $default = null) 
    {
        if (empty($name)) {
            return di()->get('config');
        }
        
        return di()->get('config')->get($name, $default);
    }
}

if (! function_exists('session')) {
    // session
    function session() 
    {
        return di()->get("session");
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

if (! function_exists('avatar_url')) {
    /**
     * 头像链接
     */
    function avatar_url($path = "")
    {
        $defaultAvatar = config("view.avatar_default", "");
        if (empty($path)) {
            return $defaultAvatar;
        }
        
        $p = config("view.avatar_url", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }
}

if (! function_exists('avatar_path')) {
    /**
     * 头像路径
     */
    function avatar_path($path): string
    {
        $p = config("view.avatar_path", "");
        
        return rtrim($p, "/") . "/" . ltrim($path, "/");
    }
}
