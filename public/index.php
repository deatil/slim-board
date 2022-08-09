<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;

use App\Route\Route;
use App\Board\Gable;
use App\Board\Bootstrap\Bootstrap;
use App\Board\Bootstrap\Handler;

require __DIR__ . '/../vendor/autoload.php';

// 设置根目录
Gable::$basePath = dirname(__DIR__);

AppFactory::setSlimHttpDecoratorsAutomaticDetection(false);
ServerRequestCreatorFactory::setSlimHttpDecoratorsAutomaticDetection(false);

// 创建一个 app
$app = AppFactory::createFromContainer(new Container());

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

// 初始化
Bootstrap::init($app);

// 路由
Route::init($app);

// 错误处理
Handler::init($app);

// Run app
$app->run();