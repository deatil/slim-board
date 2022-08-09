<?php

declare(strict_types=1);

namespace App\Controller\Board;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use App\Board\Gable;
use App\Board\Auth as BoardAuth;
use App\Board\Validation;
use App\Board\Auth\Auth as AuthTool;
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
        $data = Gable::$di->get("session")->get('login_auth');
        if (! empty($data)) {
            return $this->errorHtml($response, "你已经登录", url("board.index"));
        }
        
        return $this->view($response, 'auth/login.html', []);
    }
    
    /**
     * 详情
     */
    public function loginCheck($request, $response, $args)
    {
        $data = Gable::$di->get("session")->get('login_auth');
        if (! empty($data)) {
            return $this->errorJson($response, '你已经登录');
        }
        
        $data = $request->getParsedBody();
        
        $v = Validation::check($data, [
            ['username', 'required', 'msg' => '账号不能为空'], 
            ['username', 'min:3', 'msg' => '账号长度不能小于3个'], 
            ['password', 'required', 'msg' => '密码不能为空'], 
            ['password', 'min:3', 'msg' => '密码长度不能小于3个'], 
            ['captcha', 'required', 'msg' => '验证码不能为空'], 
            ['captcha', 'length:4', 'msg' => '验证码长度错误'], 
        ]);
        
        if ($v !== true) {
            return $this->errorJson($response, $v);
        }
        
        $username = $data['username'] ?? "";
        $password = $data['password'] ?? "";
        $captcha = $data['captcha'] ?? "";
        $rememberme = $data['rememberme'] ?? false;
        
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
        
        $check = BoardAuth::passwordVerify($password, $userInfo['password']);
        if (! $check) {
            return $this->errorJson($response, '密码或者账号错误');
        }
        
        Gable::$di->get("session")->set('login_auth', $userInfo['id']);
        
        if ($rememberme) {
            $cookieData = AuthTool::make()->encrypt((string) $userInfo['id']);
            Gable::$di->get("cookie")->set('bla', $cookieData, [
                'expire' => time() + 7 * 24 * 60 * 60,
            ]);
        }
        
        // 更改登录时间
        UserModel::updateById($userInfo['id'], [
            "login_time" => time(),
        ]);
        
        return $this->successJson($response, '登录成功');
    }
    
    /**
     * 详情
     */
    public function logout($request, $response, $args)
    {
        $data = Gable::$di->get("session")->get('login_auth');
        if (empty($data)) {
            return $this->errorHtml($response, "你还没有登录登录", url("board.auth-login"));
        }
        
        Gable::$di->get("session")->delete('login_auth');
        Gable::$di->get("cookie")->delete('bla');
        
        return $this->successHtml($response, "退出成功", url("board.auth-login"));
    }
}