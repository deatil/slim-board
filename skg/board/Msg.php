<?php

declare(strict_types=1);

namespace Skg\Board;

use Psr\Http\Message\StreamInterface;
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
        $streamFactory = new StreamFactory();
        $body = $streamFactory->createStream();
        
        // Gable::$di->get('config')->get('app.success_tpl');
        
        $view = Gable::$di->get('view')->fetch($tpl, [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 1,
        ]);
        
        $body->write($view);
        
        return $body;
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
        $streamFactory = new StreamFactory();
        $body = $streamFactory->createStream();
        
        $view = Gable::$di->get('view')->fetch($tpl , [
            'msg' => $msg,
            'url' => $url,
            'wait' => $wait,
            'code' => 0,
        ]);
        
        $body->write($view);
        
        return $body;
    }
}