<?php

declare(strict_types=1);

namespace Skg\Board;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;
use Fig\Http\Message\StatusCodeInterface;
use Slim\Psr7\Factory\StreamFactory;

use Skg\Board\Gable;

/**
 * 输出信息
 *
 * @create 2022-7-18
 * @author deatil
 */
class Msg
{
    /**
     * 获取空响应
     *
     * @return string
     */
    public static function createResponse(
        int $code = StatusCodeInterface::STATUS_OK,
        string $reasonPhrase = ''
    ): ResponseInterface {
        $response = Gable::$app->getResponseFactory()
            ->createResponse($code, $reasonPhrase);
        
        return $response;
    }
    
    /**
     * 输出数据
     *
     * @return string
     */
    public static function toData($data): StreamInterface 
    {
        $streamFactory = new StreamFactory();
        
        $body = $streamFactory->createStream();
        $body->write($data);
        
        return $body;
    }
    
    /**
     * 响应页面
     *
     * @return string
     */
    public static function toView($tpl, $data = [])
    {
        $view = Gable::$di->get('view')->fetch($tpl, $data);
        
        return static::toData($view);
    }
    
    /**
     * 输出成功页面
     *
     * @return string
     */
    public static function toSuccess(
        $msg, 
        $url = '', 
        $wait = 5,
        $tpl = 'error/error.html'
    ): StreamInterface {
        return static::toView($tpl, [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 1,
        ]);
    }
    
    /**
     * 输出错误页面
     *
     * @return string
     */
    public static function toError(
        $msg, 
        $url = '', 
        $wait = 5,
        $tpl = 'error/error.html'
    ): StreamInterface {
        return static::toView($tpl , [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 0,
        ]);
    }
    
    /**
     * 响应数据
     *
     * @return string
     */
    public static function reponseData(
        $data,
        int $code = StatusCodeInterface::STATUS_OK,
        string $reasonPhrase = ''
    ): ResponseInterface {
        $body = static::toData($data);

        return Msg::createResponse($code, $reasonPhrase)->withBody($body);
    }
    
    /**
     * 输出 json
     *
     * @return string
     */
    public static function reponseJson(
        $data,
        int $code = StatusCodeInterface::STATUS_OK,
        string $reasonPhrase = ''
    ): ResponseInterface {
        return static::reponseData($data, $code, $reasonPhrase)
            ->withHeader("Content-Type", "application/json; charset=utf-8");
    }
    
    /**
     * 响应页面
     *
     * @return string
     */
    public static function reponseView($tpl, $data = []): ResponseInterface
    {
        $view = Gable::$di->get('view')->fetch($tpl, $data);
        
        return static::reponseData($view);
    }
    
    /**
     * 输出成功页面
     *
     * @return string
     */
    public static function reponseSuccess(
        $msg, 
        $url = '', 
        $wait = 5,
        $tpl = 'error/error.html'
    ): ResponseInterface {
        return static::reponseView($tpl, [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 1,
        ]);
    }
    
    /**
     * 输出错误页面
     *
     * @return string
     */
    public static function reponseError(
        $msg, 
        $url = '', 
        $wait = 5,
        $tpl = 'error/error.html'
    ): ResponseInterface {
        return static::reponseView($tpl , [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 0,
        ]);
    }

}