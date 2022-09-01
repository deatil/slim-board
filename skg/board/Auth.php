<?php

declare(strict_types=1);

namespace Skg\Board;

/**
 * Auth
 *
 * @create 2022-7-17
 * @author deatil
 */
class Auth
{
    /**
     * 加密密码
     *
     * @param string $pass 密码
     */
    public static function passwordHash(string $pass)
    {
        return password_hash($pass, PASSWORD_BCRYPT);
    }
    
    /**
     * 加密密码验证
     *
     * @param string $pass 密码
     * @param string $hash 加密的密码
     */
    public static function passwordVerify(string $pass, string $hash)
    {
        return password_verify($pass, $hash);
    }
    
}