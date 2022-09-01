<?php

declare(strict_types=1);

namespace Skg\Board\Auth;

use Skg\Board\DES;
use Skg\Board\Gable;

/**
 * Auth
 *
 * @create 2022-7-19
 * @author deatil
 */
class Auth
{
    // 方法
    private $method = 'DES-EDE3-CBC';
    
    // 密钥
    private $key = '';
    
    // 向量
    private $iv = '';
    
    // 输出类型
    private $output = DES::OUTPUT_BASE64;
    
    /**
     * 构造函数
     */
    public function __construct($key, $method, $output, $iv)
    {
        $this->key = $key;
        $this->method = $method;
        $this->output = $output;
        $this->iv = $iv;
    }
    
    /**
     * 生成
     */
    public static function make()
    {
        $config = Gable::$di->get('config');
        
        $key = $config->get('auth.key');
        $method = $config->get('auth.method');
        $iv = $config->get('auth.iv');
        $output = $config->get('auth.output');
        
        $des = new static($key, $method, $output, $iv);
        return $des;
    }
    
    /**
     * 加密
     *
     * @param string $data 数据
     */
    public function encrypt($data)
    {
        $des = new DES($this->key, $this->method, $this->output, $this->iv);
        $res = $des->encrypt($data);
        
        return $res;
    }
    
    /**
     * 解密
     *
     * @param string $data 数据
     */
    public function decrypt($data)
    {
        $des = new DES($this->key, $this->method, $this->output, $this->iv);
        $res = $des->decrypt($data);
        
        return $res;
    }
    
}