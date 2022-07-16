<?php

use DI\Container;
use Slim\Factory\AppFactory;

use App\Bootstrap\Bootstrap;
use App\Route\Route;
use App\Gable\Gable;

require __DIR__ . '/../vendor/autoload.php';

// 创建一个 app
$app = AppFactory::createFromContainer(new Container());

// 设置根目录
Gable::$basePath = dirname(__DIR__);

// 初始化
Bootstrap::init($app);

// 路由
Route::init($app);

// Run app
$app->run();