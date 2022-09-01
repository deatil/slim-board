<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use Skg\Board\Gable;
use Skg\Board\Validation;
use Skg\Board\Auth as BoardAuth;
use Skg\Board\Auth\User as AuthUser;

/**
 * 账号相关
 *
 * @create 2022-7-18
 * @author deatil
 */
class Auth extends Base
{
    /**
     * 首页
     */
    public function captcha($request, $response, $args)
    {
        $phraseBuilder = new PhraseBuilder(4);
        $captcha = new CaptchaBuilder(null, $phraseBuilder);
        $captcha->build(150, 40);
        
        $captchaId = $captcha->getPhrase();
        
        Gable::$di->get("session")->set('captcha_id', $captchaId);
        
        ob_start();
        $captcha->output();
        $captchaImage = ob_get_contents();
        ob_end_clean();
        
        // 输出图片
        header('Content-type:image/jpeg');
        $response
            ->getBody()
            ->write($captchaImage);
        return $response;
    }
    
    /**
     * 详情
     */
    public function login($request, $response, $args)
    {
        $data = Gable::$di->get("session")->get('admin_auth');
        if (! empty($data)) {
            return $this->errorHtml($response, "你已经登录", url("admin.index"));
        }
        
        return $this->view($response, 'auth/login.html', []);
    }
    
    /**
     * 详情
     */
    public function loginCheck($request, $response, $args)
    {
        $data = Gable::$di->get("session")->get('admin_auth');
        if (! empty($data)) {
            return $this->errorJson($response, '你已经登录');
        }
        
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['password', 'required', 'msg' => '密码不能为空'], 
            ['password', 'min:3', 'msg' => '密码长度不能小于3个'], 
            ['captcha', 'required', 'msg' => '验证码不能为空'], 
            ['captcha', 'length:4', 'msg' => '验证码长度错误'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $password = $data['password'] ?? "";
        $captcha = $data['captcha'] ?? "";
        
        $sessionCaptcha = Gable::$di->get("session")->get('captcha_id');
        if (empty($sessionCaptcha)) {
            return $this->errorJson($response, '验证码已失效');
        }
        
        if (strtolower($captcha) != strtolower($sessionCaptcha)) {
            return $this->errorJson($response, '验证码错误');
        }
        
        Gable::$di->get("session")->delete('captcha_id');
        
        $userInfo = AuthUser::info();
        
        $check = BoardAuth::passwordVerify($password, $userInfo['password']);
        if (! $check) {
            return $this->errorJson($response, '密码或者账号错误');
        }
        
        Gable::$di->get("session")->set('admin_auth', $userInfo['id']);
        
        return $this->successJson($response, '登录成功');
    }
    
    /**
     * 详情
     */
    public function logout($request, $response, $args)
    {
        $data = Gable::$di->get("session")->get('admin_auth');
        if (empty($data)) {
            return $this->errorHtml($response, "你还没有登录登录", url("admin.auth-login"));
        }
        
        Gable::$di->get("session")->delete('admin_auth');
        
        return $this->successHtml($response, "退出成功", url("admin.auth-login"));
    }
}