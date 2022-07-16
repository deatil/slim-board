<?php

declare(strict_types=1);

namespace App\Utils;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

/**
 * 日志
 *
 * @create 2022-7-16
 * @author deatil
 */
class Logger
{
    // 等级列表
    protected static $levels = [
        'DEBUG'     => MonologLogger::DEBUG,
        'INFO'      => MonologLogger::INFO,
        'NOTICE'    => MonologLogger::NOTICE,
        'WARNING'   => MonologLogger::WARNING,
        'ERROR'     => MonologLogger::ERROR,
        'CRITICAL'  => MonologLogger::CRITICAL,
        'ALERT'     => MonologLogger::ALERT,
        'EMERGENCY' => MonologLogger::EMERGENCY,
    ];

    /**
     * 使用日志
     * 
     * $log->debug('debug');
     * $log->info('info');
     * $log->notice('notice');
     * $log->warning('warning');
     * $log->error('error');
     * $log->critical('critical');
     * $log->alert('alert');
     * $log->emergency('emergency');
     */
    public static function make(
        string $name, 
        string $path,
        string $level = "WARNING"
    ) {
        $log = new MonologLogger($name);
        
        $newLevel = MonologLogger::WARNING;
        if (isset(static::$levels[$level])) {
            $newLevel = static::$levels[$level];
        }
        
        $stream = new StreamHandler($path, $newLevel);
        $log->pushHandler($stream);
        
        return $log;
    }
}