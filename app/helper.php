<?php

use App\Gable\Gable;
use App\Utils\Url;

if (! function_exists('app')) {
    // app
    function app() {
        return Gable::$app;
    }
}

if (! function_exists('di')) {
    // di
    function di() {
        return Gable::$di;
    }
}
if (! function_exists('url')) {
    // di
    function url(string $routeName, array $data = [], array $queryParams = []) {
        return Url::to($routeName, $data, $queryParams);
    }
}