<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use App\Board\Msg;
use App\Auth\User as AuthUser;

/**
 * 管理员验证
 *
 * @create 2022-7-20
 * @author deatil
 */
class AdminCheckMiddleware implements MiddlewareInterface
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
        $response = $handler->handle($request);
        
        $isAdmin = AuthUser::isAdmin();
        if (! $isAdmin) {
            $body = Msg::toError("你没有权限访问该页面");
            
            return $response->withBody($body);
        }
        
        return $response;
    }

}
