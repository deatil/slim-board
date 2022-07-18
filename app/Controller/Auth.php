<?php

declare(strict_types=1);

namespace App\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use App\Gable\Gable;
use App\Board\Auth as AuthBoard;
use App\Model\User as UserModel;

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
        $captcha->build();
        
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
        return $this->view($response, 'auth/login.html', []);
    }
    
    /**
     * 详情
     */
    public function loginCheck($request, $response, $args)
    {
        $data = $request->getParsedBody();
        
        $username = $data['username'] ?? "";
        $password = $data['password'] ?? "";
        $captcha = $data['captcha'] ?? "";
        
        if (empty($username)) {
            return $this->errorJson($response, '账号不能为空');
        }
        if (empty($password)) {
            return $this->errorJson($response, '密码不能为空');
        }
        if (empty($captcha)) {
            return $this->errorJson($response, '验证码错误');
        }
        
        $sessionCaptcha = Gable::$di->get("session")->get('captcha_id');
        if (empty($sessionCaptcha)) {
            return $this->errorJson($response, '验证码已失效');
        }
        
        if (strtolower($captcha) != strtolower($sessionCaptcha)) {
            return $this->errorJson($response, '验证码错误');
        }
        
        Gable::$di->get("session")->delete('captcha_id');
        
        $userInfo = UserModel::getInfoByUsername($username);
        if (empty($userInfo)) {
            return $this->errorJson($response, '登录失败');
        }
        
        $check = AuthBoard::passwordVerify($password, $userInfo['password']);
        if (! $check) {
            return $this->errorJson($response, '密码或者账号错误');
        }
        
        Gable::$di->get("session")->set('login_auth', $userInfo['id']);
        
        return $this->successJson($response, '登录成功');
    }
    
    /**
     * 详情
     */
    public function logout($request, $response, $args)
    {
        Gable::$di->get("session")->delete('login_auth');
        
        return $this->view($response, 'auth/logout.html', []);
    }
}