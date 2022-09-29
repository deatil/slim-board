<?php

return [
    // 模板目录
    'path'  => 'data/views',
    // 调试
    'debug' => false,
    // 模板缓存地址
    'cache' => 'data/runtime/views',
    // 编码
    'charset'  => 'UTF-8',
    // 自动过滤
    'autoescape'  => 'html',
    // 自动更新
    'auto_reload' => true,
    // 严格
    'strict_variables' => false,
    // 
    'optimizations' => -1,
    
    // 静态文件根目录
    'assets' => '/static',
    // 静态文件根目录
    'board_assets' => '/static/board',
    // 静态文件根目录
    'admin_assets' => '/static/admin',
    
    // 头像目录
    'avatar_path' => './upload/avatar',
    // 头像链接根路径
    'avatar_url' => '/upload/avatar',
    // 默认头像
    'avatar_default' => '/static/board/image/avatar-default.jpg',
];
