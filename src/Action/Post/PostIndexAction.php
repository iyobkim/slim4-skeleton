<?php

namespace App\Action\Post;

use App\Renderer\TemplateRenderer;
use Illuminate\Database\Connection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PostIndexAction
{
    public function __construct(
        private TemplateRenderer $renderer,
        private Connection $connection,
    ) {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        // TODO:
        $posts = $this->connection->table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id', 'left')
            ->select('posts.*', 'users.name as author')
            ->whereNotNull('published_at')
            ->orderBy('created_at desc')
            ->limit(3)
            ->offset(3)
            ->get();

        return $this->renderer->template($response, 'posts/index.latte', compact('posts'));
    }
}
