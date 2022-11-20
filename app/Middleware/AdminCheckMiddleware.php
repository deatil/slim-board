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
        $authUser = $request->getAttribute("auth-user");
        
        if (empty($authUser) || !$authUser->isLogin()) {
            return $this->error($request, "请先登录", url("board.auth-login"));
        }
        
        if (! $authUser->isActive()) {
            return $this->error($request, "账号不存在或者已被禁用");
        }
        
        if (! $authUser->isAdmin()) {
            return $this->error($request, "你没有权限访问该页面");
        }
        
        return $handler->handle($request);
    }
    
    /**
     * 错误
     */
    protected function error($request, $msg, $url = '')
    {
        $response = Msg::createResponse(200);
        
        $method = $request->getMethod();
        if (strtolower($method) == "post") {
            return Response::errorJson($response, $msg, 1);
        }
        
        $body = Msg::toError($msg, $url, 3, $this->template());
        return $response->withBody($body);
    }
    
    /**
     * 模板
     */
    protected function template()
    {
        $config = Gable::$di->get('config');
        
        $theme = $config->get("app.admin_theme");
        $template = $config->get('app.jump_tpl');
        
        return "admin/{$theme}/" . ltrim($template, "/");
    }
}
