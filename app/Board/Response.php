<?php

declare(strict_types=1);

namespace App\Board;

/**
 * 响应
 *
 * @create 2022-7-17
 * @author deatil
 */
class Response
{
    /**
     * 数据
     *
     * @param object $response 响应对象
     * @param mixed  $data     数据
     */
    public static function data($response, $data)
    {
        $response->getBody()->write($data);
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
        
        header('Content-type:application/json; charset=utf-8');
        $response = $response->withHeader("Content-Type", "application/json; charset=utf-8");
        
        return static::data($response, $payload);
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
    
}