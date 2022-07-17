<?php

declare(strict_types=1);

namespace App\Bootstrap;

use Throwable;
use Psr\Http\Message\ServerRequestInterface;
use Zeuxisoo\Whoops\Slim\WhoopsMiddleware;

use App\Gable\Gable;

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

                $response = $app->getResponseFactory()->createResponse();
                $response->getBody()->write($payload);

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
    }
}