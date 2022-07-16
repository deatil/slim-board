<?php

declare(strict_types=1);

namespace App\Utils;

/**
 * cookie
 *
 * @create 2022-7-15
 * @author deatil
 */
class Cookie
{
    // 过期时间 单位为s 默认是会话 关闭浏览器就不在存在
    private $expire   = 0;
    
    // 路径 默认在本目录及子目录下有效 /表示根目录下有效
    private $path     = '';
    
    // 域
    private $domain   = '';
    
    // 是否只在https协议下设置默认不是
    private $secure   = false;
    
    // 如果为TRUE，则只能通过HTTP协议访问cookie。 这意味着脚本语言（例如JavaScript）无法访问cookie
    private $httponly = false;
    
    // 单例对象
    private static $instance = null;
    
    /**
     * 构造函数
     */
    private function __construct(array $options = [])
    {
        $this->setOptions($options);
    }
    
    /**
     * 单例模式
     *
     * @param  array  $options cookie相关选项
     * @return object $options 对象实例
     */
    public static function make(array $options = [])
    {
        if (!self::$instance) {
            self::$instance = new static($options);
        }
        
        return self::$instance;
    }
    
    /**
     * 设置cookie
     *
     * @param string $name    cookie名称
     * @param mixed  $vlaue   cookie值
     * @param array  $options cookie相关选项
     */
    public function set($name, $value, array $options = [])
    {
        if (!empty($options)) {
            $this->setOptions($options);
        }
        
        if (is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }
        
        // 保存 cookie
        $this->setcookie($name, $value, $this->expire);
    }
    
    /**
     * 读取cookie值
     *
     * @param  string $name cookie键值
     * @return mixed  数组形式的值或者单个的值
     */
    public function get($name)
    {
        if (! isset($_COOKIE[$name])) {
            return "";
        }
        
        $value = $_COOKIE[$name];
        if (is_array($value)) {
            $arr = [];
            foreach ($value as $k => $v) {
                $arr[$k] = substr($v, 0, 1) == '{' ? json_decode($value) : $v;
            }
            
            return $arr;
        } else {
            return substr($value, 0, 1) == '{' ? json_decode($value) : $value;
        }
    }
    
    /**
     * 删除相应的cookie
     * 
     * @param  string $name    cookie名称 可以是数组
     * @param  array  $options cookie相关参数
     * @return void
     */
    public function delete($name, array $options = [])
    {
        if (!empty($options)) {
            $this->setOptions($options);
        }

        if (! isset($_COOKIE[$name])) {
            return;
        }

        $value = $_COOKIE[$name];
        if (is_array($value)) {
            foreach ($value as $k => $v) {
                $this->setcookie($name.'['.$k.']', '', time() - 1);
            }
        } else {
            $this->setcookie($name, '', time() - 1);
        }
    }
    
    /**
     * 简短的设置
     * 
     * @param  string $key    键
     * @param  array  $value  值
     * @param  array  $expire 过期时间
     * @return void
     */
    public function setcookie($key, $value, $expire, array $options = []) 
    {
        if (!empty($options)) {
            $this->setOptions($options);
        }

        setcookie(
            $key,
            $value,
            $expire,
            $this->path,
            $this->domain,
            $this->secure,
            $this->httponly
        );
    }
    
    /**
     * 设置配置
     */
    private function setOptions(array $options = [])
    {
        if (isset($options['expire'])) {
            $this->expire = $options['expire'];
        }
        
        if (isset($options['path'])) {
            $this->path = $options['path'];
        }
        
        if (isset($options['domain'])) {
            $this->domain = $options['domain'];
        }
        
        if (isset($options['secure'])) {
            $this->secure = $options['secure'];
        }
        
        if (isset($options['httponly'])) {
            $this->httponly = $options['httponly'];
        }
        
        return $this;
    }

}