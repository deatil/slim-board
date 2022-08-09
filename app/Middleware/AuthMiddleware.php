<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use App\Board\Msg;
use App\Board\Gable;
use App\Board\Auth\Auth as AuthTool;

/**
 * 登录验证
 *
 * @create 2022-7-18
 * @author deatil
 */
class AuthMiddleware implements MiddlewareInterface
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
        $app = Gable::$app;
        $di = Gable::$di;
        
        $response = $app->getResponseFactory()->createResponse(200);
        
        $id = $di->get("session")->get('login_auth');
        if (empty($id)) {
            $id = $di->get("cookie")->get('bla');
            if (! empty($id)) {
                $id = AuthTool::make()->decrypt($id);
            }
            
            if (empty($id)) {
                $body = Msg::toError("请先登录");
                
                return $response->withBody($body);
            }
            
            $di->get("session")->set('login_auth', $id);
        }
        
        return $handler->handle($request);
    }

}
