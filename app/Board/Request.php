<?php

declare(strict_types=1);

namespace App\Board;

/**
 * 请求
 *
 * @create 2022-7-17
 * @author deatil
 */
class Request
{
    /**
     * 数据
     *
     * @param array $data    数据
     * @param mixed $name    键
     * @param mixed $default 默认值
     */
    public static function from($data, $name, $default = null)
    {
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * get 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function get($request, $name, $default = null)
    {
        $data = $request->getQueryParams();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * post 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function post($request, $name, $default = null)
    {
        $data = $request->getParsedBody();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * cookie 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function cookie($request, $name, $default = null)
    {
        $data = $request->getCookieParams();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * attribute 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function attribute($request, $name, $default = null)
    {
        $data = $request->getAttributes();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * serverparam 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function serverParam($request, $name, $default = null)
    {
        $data = $request->getServerParams();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
}