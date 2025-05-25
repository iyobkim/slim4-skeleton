<?php

// Define app routes

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\Home\HomeAction::class)->setName('home');
    $app->get('/ping', \App\Action\Home\PingAction::class);

    $app->get('/posts', \App\Action\Post\PostIndexAction::class)->setName('posts.index');
};
