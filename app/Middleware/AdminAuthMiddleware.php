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
class AdminAuthMiddleware implements MiddlewareInterface
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
        $response = Gable::$app->getResponseFactory()->createResponse(200);
        
        $id = Gable::$di->get("session")->get('admin_auth');
        if (empty($id)) {
            $template = $this->template();
            
            $body = Msg::toError("请先登录", url("admin.auth-login"), 3, $template);
            
            return $response->withBody($body);
        }
        
        return $handler->handle($request);
    }
    
    /**
     * 模板
     */
    public function template()
    {
        $config = Gable::$di->get('config');
        
        $theme = $config->get("app.admin_theme");
        $template = $config->get('app.jump_tpl');
        
        return "admin/{$theme}/" . ltrim($template, "/");
    }

}
