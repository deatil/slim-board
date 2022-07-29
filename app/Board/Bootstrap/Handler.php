<?php

declare(strict_types=1);

namespace App\Board\Bootstrap;

use Throwable;
use Psr\Http\Message\ServerRequestInterface;
use Zeuxisoo\Whoops\Slim\WhoopsMiddleware;
use Slim\Middleware\ContentLengthMiddleware;

use App\Board\Msg;
use App\Board\Gable;

/**
 * Handler
 *
 * @create 2022-7-17
 * @author deatil
 */
class Handler
{
    /**
     * 初始化
     *
     * @param array $app app
     */
    public static function init($app)
    {
        if (! Gable::$debug) {
            // 定义自定义错误处理程序
            $customErrorHandler = function (
                ServerRequestInterface $request,
                Throwable $exception,
                bool $displayErrorDetails,
                bool $logErrors,
                bool $logErrorDetails
            ) use ($app) {
                $payload = $exception->getMessage();
                
                $template = Gable::$di->get('config')->get('app.error_tpl');;
                
                $msg = Gable::$di->get('config')->get('app.error_msg');;
                $body = Msg::toError($msg, '', 3, $template);

                $response = $app->getResponseFactory()->createResponse();
                $response = $response->withBody($body);

                return $response;
            };

            // 错误处理
            $errorMiddleware = $app->addErrorMiddleware(true, true, true);
            $errorMiddleware->setDefaultErrorHandler($customErrorHandler);
        } else {
            // 添加错误拦截
            $app->add(new WhoopsMiddleware([
                'enable' => true,
                'editor' => 'sublime',
                'title'  => 'Slim Board Error',
            ]));
        }
        
        $contentLengthMiddleware = new ContentLengthMiddleware();
        $app->add($contentLengthMiddleware);
    }
}