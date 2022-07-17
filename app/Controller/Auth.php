<?php

declare(strict_types=1);

namespace App\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use App\Gable\Gable;
use App\Utils\Response;
use App\Utils\Auth as AuthUtils;
use App\Model\User as UserModel;

/**
 * 账号相关
 *
 * @create 2022-7-18
 * @author deatil
 */
class Auth
{
    /**
     * 首页
     */
    public function captcha()
    {
        return function($request, $response, $args) {
            $phraseBuilder = new PhraseBuilder(4);
            $captcha = new CaptchaBuilder(null, $phraseBuilder);
            $captcha->build();
            
            $captchaId = $captcha->getPhrase();
            
            Gable::$di->get("session")->set('captcha_id', $captchaId);
            
            ob_start();
            $captcha->output();
            $captchaImage = ob_get_contents();
            ob_end_clean();
            
            $response
                ->withHeader('Content-type', 'image/jpeg')
                ->getBody()
                ->write($captchaImage);
            return $response;
        };
    }
    
    /**
     * 详情
     */
    public function login()
    {
        return function($request, $response, $args) {
            return $this->get('view')->render($response, 'auth/login.html', []);
        };
    }
    
    /**
     * 详情
     */
    public function loginCheck()
    {
        return function($request, $response, $args) {
            $data = $request->getParsedBody();
            
            $username = $data['username'] ?? "";
            $password = $data['password'] ?? "";
            $captchaid = $data['captchaid'] ?? "";
            
            if (empty($username)) {
                return Response::errorJson($response, '账号不能为空');
            }
            if (empty($password)) {
                return Response::errorJson($response, '密码不能为空');
            }
            if (empty($captchaid)) {
                return Response::errorJson($response, '验证码错误');
            }
            
            $sessionCaptcha = Gable::$di->get("session")->get('captcha_id');
            if (empty($sessionCaptcha)) {
                return Response::errorJson($response, '验证码已失效');
            }
            
            if (strtolower($captchaid) != strtolower($sessionCaptcha)) {
                return Response::errorJson($response, '验证码错误');
            }
            
            $userInfo = UserModel::getInfoByUsername($username);
            if (empty($data)) {
                return Response::errorJson($response, '登录失败');
            }
            
            $check = AuthUtils::passwordVerify($password, $userInfo['password']);
            if (! $check) {
                return Response::errorJson($response, '密码或者账号错误');
            }
            
            Gable::$di->get("session")->set('login_auth', $userInfo['id']);
            
            return Response::successJson($response, '登录成功');
        };
    }
    
    /**
     * 详情
     */
    public function logout()
    {
        return function($request, $response, $args) {
            Gable::$di->get("session")->delete('login_auth');
            
            return $this->get('view')->render($response, 'auth/logout.html', []);
        };
    }
}