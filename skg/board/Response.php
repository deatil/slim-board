<?php

declare(strict_types=1);

namespace Skg\Board;

use Slim\Psr7\NonBufferedBody;
use Slim\Psr7\Factory\StreamFactory;

/**
 * 响应
 *
 * @create 2022-7-17
 * @author deatil
 */
class Response
{
    /**
     * 响应数据
     *
     * @param object $response 响应对象
     * @param mixed  $data     数据
     */
    public static function data($response, $data)
    {
        $streamFactory = new StreamFactory();

        // $body = $response->getBody();
        $body = $streamFactory->createStream();
        $body->write($data);
        
        $response = $response->withBody($body);
        return $response;
    }
    
    /**
     * json
     *
     * @param object $response 响应对象
     * @param mixed  $data     数据
     */
    public static function json($response, $data)
    {
        $payload = json_encode($data, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        
        $response = static::data($response, $payload);
        $response = $response->withHeader("Content-Type", "application/json; charset=utf-8");
        
        return $response;
    }
    
    /**
     * 失败
     *
     * @param object $response 响应对象
     * @param string $msg      提示信息
     * @param int    $code     状态码
     */
    public static function errorJson($response, string $msg, int $code = 1)
    {
        $payload = [
            'code' => $code,
            'msg'  => $msg,
            'data' => '',
        ];
        
        return static::json($response, $payload);
    }
    
    /**
     * 成功
     *
     * @param object $response 响应对象
     * @param string $msg      提示信息
     * @param mixed  $data     内容数据
     */
    public static function successJson($response, string $msg = "操作成功", $data = "")
    {
        $payload = [
            'code' => 0,
            'msg'  => $msg,
            'data' => $data,
        ];
        
        return static::json($response, $payload);
    }
    
    /**
     * URL重定向
     *
     * @param object $response 响应对象
     * @param string $url      跳转链接
     * @param mixed  $code     状态码
     * @return object $response 响应对象
     */
    public static function redirect($response, string $url, int $code = 302)
    {
        $body = new NonBufferedBody();
        $response = $response->withBody($body);
        
        $response = $response->withHeader("Cache-control", "no-cache,must-revalidate");
        $response = $response->withHeader("Location", $url);
        
        $response = $response->withStatus($code);
        
        return $response;
    }
    
}