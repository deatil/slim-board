<?php

declare(strict_types=1);

namespace Skg\Board;

/**
 * 请求
 *
 * @create 2022-7-17
 * @author deatil
 */
class Request
{
    /**
     * 数据
     *
     * @param array $data    数据
     * @param mixed $name    键
     * @param mixed $default 默认值
     */
    public static function from($data, $name, $default = null)
    {
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * get 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function get($request, $name, $default = null)
    {
        $data = $request->getQueryParams();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * post 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function post($request, $name, $default = null)
    {
        $data = $request->getParsedBody();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * cookie 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function cookie($request, $name, $default = null)
    {
        $data = $request->getCookieParams();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * attribute 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function attribute($request, $name, $default = null)
    {
        $data = $request->getAttributes();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * serverparam 数据
     *
     * @param object $request 请求对象
     * @param mixed  $name    键
     * @param mixed  $default 默认值
     */
    public static function serverParam($request, $name, $default = null)
    {
        $data = $request->getServerParams();
        
        $config = Config::make();
        $config->set($data);
        
        return $config->get($name, $default);
    }
    
    /**
     * 获取客户端IP地址
     *
     * @access public
     * @param  integer   $request 请求对象
     * @param  integer   $type    返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param  boolean   $adv     是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    public static function ip($request, $type = 0, $adv = true)
    {
        $type      = $type ? 1 : 0;
        static $ip = null;

        if (null !== $ip) {
            return $ip[$type];
        }

        if ($adv) {
            if (static::serverParam($request, 'HTTP_X_FORWARDED_FOR')) {
                $arr = explode(',', static::serverParam($request, 'HTTP_X_FORWARDED_FOR'));
                $pos = array_search('unknown', $arr);
                if (false !== $pos) {
                    unset($arr[$pos]);
                }
                
                $ip = trim(current($arr));
            } elseif (static::serverParam($request, 'HTTP_CLIENT_IP')) {
                $ip = static::serverParam($request, 'HTTP_CLIENT_IP');
            } elseif (static::serverParam($request, 'REMOTE_ADDR')) {
                $ip = static::serverParam($request, 'REMOTE_ADDR');
            }
        } elseif (static::serverParam($request, 'REMOTE_ADDR')) {
            $ip = static::serverParam($request, 'REMOTE_ADDR');
        }

        // IP地址类型
        $ipMode = (strpos($ip, ':') === false) ? 'ipv4' : 'ipv6';

        // IP地址合法验证
        if (filter_var($ip, FILTER_VALIDATE_IP) !== $ip) {
            $ip = ('ipv4' === $ipMode) ? '0.0.0.0' : '::';
        }

        // 如果是ipv4地址，则直接使用ip2long返回int类型ip；
        // 如果是ipv6地址，暂时不支持，直接返回0
        $longIp = ('ipv4' === $ipMode) ? sprintf("%u", ip2long($ip)) : 0;

        $ip = [$ip, $longIp];

        return $ip[$type];
    }
    
    /**
     * 检测是否是合法的IP地址
     *
     * @param string $ip   IP地址
     * @param string $type IP地址类型 (ipv4, ipv6)
     * @return boolean
     */
    public static function isValidIP(string $ip, string $type = ''): bool
    {
        switch (strtolower($type)) {
            case 'ipv4':
                $flag = FILTER_FLAG_IPV4;
                break;
            case 'ipv6':
                $flag = FILTER_FLAG_IPV6;
                break;
            default:
                $flag = 0;
                break;
        }

        return boolval(filter_var($ip, FILTER_VALIDATE_IP, $flag));
    }

    /**
     * 将IP地址转换为二进制字符串
     *
     * @param string $ip
     * @return string
     */
    public static function ip2bin(string $ip): string
    {
        if (static::isValidIP($ip, 'ipv6')) {
            $IPHex = str_split(bin2hex(inet_pton($ip)), 4);
            foreach ($IPHex as $key => $value) {
                $IPHex[$key] = intval($value, 16);
            }
            $IPBin = vsprintf('%016b%016b%016b%016b%016b%016b%016b%016b', $IPHex);
        } else {
            $IPHex = str_split(bin2hex(inet_pton($ip)), 2);
            foreach ($IPHex as $key => $value) {
                $IPHex[$key] = intval($value, 16);
            }
            $IPBin = vsprintf('%08b%08b%08b%08b', $IPHex);
        }

        return $IPBin;
    }
    
}