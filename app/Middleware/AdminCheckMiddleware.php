<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use Skg\Board\Msg;
use Skg\Board\Gable;

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
        $response = Msg::createResponse(200);
        
        $authUser = $request->getAttribute("auth-user");
        
        if (!$authUser->isLogin()) {
            $body = $this->toMsg("请先登录");
            return $response->withBody($body);
        }
        
        if (! $authUser->isActive()) {
            $body = $this->toMsg("账号不存在或者已被禁用");
            return $response->withBody($body);
        }
        
        if (! $authUser->isAdmin()) {
            $body = $this->toMsg("你没有权限访问该页面");
            return $response->withBody($body);
        }
        
        return $handler->handle($request);
    }
    
    /**
     * 模板
     */
    protected function toMsg($msg)
    {
        $template = $this->template();
        
        $body = Msg::toError($msg, "", 3, $template);
        
        return $body;
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
