<?php

use App\Middleware\ExceptionMiddleware;
use App\Middleware\FlashMessagesMiddleware;
use RKA\SessionMiddleware;
use Slim\App;

return function (App $app) {
    $app->addBodyParsingMiddleware();
    $app->add(FlashMessagesMiddleware::class);
    $app->add(SessionMiddleware::class);
    $app->addRoutingMiddleware();
    $app->add(ExceptionMiddleware::class);
};
