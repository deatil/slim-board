<?php

return [
    'type'  => 'mysql',
    'host' => '127.0.0.1',
    'port' => 3306,
    'database' => 'slim_board',
    'username' => 'root',
    'password' => '123456',
    'charset' => 'utf8mb4',
    'prefix' => 'board_',
    
    // 调试
    'debug' => false,
    
    // PDO::ERRMODE_SILENT (default) 
    // | PDO::ERRMODE_WARNING 
    // | PDO::ERRMODE_EXCEPTION
    'error' => PDO::ERRMODE_EXCEPTION,
];
