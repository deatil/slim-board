<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use Skg\Board\Msg;
use Skg\Board\Gable;
use Skg\Board\Auth\Auth as AuthTool;
use Skg\Board\Auth\User as AuthUser;

use App\Model\User as UserModel;

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
        $di = Gable::$di;
        
        $id = $di->get("session")->get('login_auth');
        if (empty($id)) {
            $id = $di->get("cookie")->get('bla');
            if (! empty($id)) {
                $id = AuthTool::make()->decrypt($id);
            }
            
            $di->get("session")->set('login_auth', $id);
        }
        
        if (empty($id)) {
            $authUser = new AuthUser();
            $authUser->withId(0);
            $request->withAttribute("auth-user", $authUser);
        
            return $handler->handle($request);
        }
        
        $userInfo = UserModel::getInfoById($id);
        
        $authUser = new AuthUser();
        $authUser->withId($id);
        $authUser->withUserInfo($userInfo);
        
        $request = $request->withAttribute("auth-user", $authUser);
        // $authUser = $request->getAttribute("auth-user");
        
        return $handler->handle($request);
    }

}
