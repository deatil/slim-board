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
        $view = Gable::$di->get('view')->fetch($tpl, [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 1,
        ]);
        
        return static::toData($view);
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
        $view = Gable::$di->get('view')->fetch($tpl , [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 0,
        ]);
        
        return static::toData($view);
    }
}