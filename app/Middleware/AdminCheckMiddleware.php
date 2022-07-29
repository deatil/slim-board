<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use App\Board\Msg;
use App\Board\Gable;
use App\Board\Auth\User as AuthUser;

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
        $response = Gable::$app->getResponseFactory()->createResponse(200);
        
        $isAdmin = AuthUser::isAdmin();
        if (! $isAdmin) {
            $template = $this->template();
            
            $body = Msg::toError("你没有权限访问该页面", "", 3, $template);
            
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
