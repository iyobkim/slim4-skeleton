<?php

use App\Middleware\ExceptionMiddleware;
use Slim\App;

return function (App $app) {
    $app->addBodyParsingMiddleware();
    $app->addRoutingMiddleware();
    $app->add(ExceptionMiddleware::class);
};
