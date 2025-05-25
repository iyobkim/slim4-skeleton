<?php

// Define app routes

use Slim\App;
use Slim\Csrf\Guard;

return function (App $app) {
    // csrf
    $app->add(Guard::class);

    $app->get('/', \App\Action\Home\HomeAction::class)->setName('home');
    $app->get('/ping', \App\Action\Home\PingAction::class);

    $app->get('/posts', \App\Action\Post\PostIndexAction::class)->setName('posts.index');
};
