<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use Skg\Board\Msg;
use Skg\Board\Gable;
use Skg\Board\Response;

/**
 * 登录检测
 *
 * @create 2022-9-20
 * @author deatil
 */
class CheckLoginMiddleware implements MiddlewareInterface
{
    /**
     * @param ServerRequestInterface  $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     *
     * @throws HttpNotFoundException
     * @throws HttpMethodNotAllowedException
     * @throws RuntimeException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $authUser = $request->getAttribute("auth-user");
        
        if (empty($authUser) || !$authUser->isLogin()) {
            return $this->responseMsg($request, "请先登录");
        }
        
        if (! $authUser->isActive()) {
            return $this->responseMsg($request, "账号不存在或者已被禁用");
        }
        
        return $handler->handle($request);
    }
    
    protected function responseMsg(ServerRequestInterface $request, string $msg)
    {
        $app = Gable::$app;
        $response = $app->getResponseFactory()->createResponse(200);
        
        $method = $request->getMethod();
        if (strtolower($method) == "post") {
            return Response::errorJson($response, $msg, 1);
        }
        
        return $response->withBody(Msg::toError($msg));
    }

}
