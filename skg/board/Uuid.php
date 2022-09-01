<?php

declare(strict_types=1);

namespace Skg\Board;

use Ramsey\Uuid\Uuid;

/**
 * Uuid
 *
 * @create 2022-7-16
 * @author deatil
 */
class Uuid
{
    /**
     * 生成 uuid 字符
     *
     * @return string
     */
    public static function make(): string
    {
        $uuid = Uuid::uuid4();
        
        return $uuid->toString();
    }
}