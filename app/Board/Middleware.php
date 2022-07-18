<?php

declare(strict_types=1);

namespace App\Board;

use Psr\Http\Message\StreamInterface;
use Slim\Psr7\Factory\StreamFactory;

use App\Gable\Gable;

/**
 * 中间件输出错误信息
 *
 * @create 2022-7-18
 * @author deatil
 */
class Middleware
{
    /**
     * 视图
     *
     * @return string
     */
    public static function toError($msg, $url = '', $wait = 10): StreamInterface
    {
        $streamFactory = new StreamFactory();
        $body = $streamFactory->createStream();
        
        $view = Gable::$di->get('view')->fetch("error/error.html", [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
        ]);
        
        $body->write($view);
        
        return $body;
    }
}