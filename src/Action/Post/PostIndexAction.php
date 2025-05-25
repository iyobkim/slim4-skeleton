<?php

namespace App\Action\Post;

use App\Renderer\JsonRenderer;
use Illuminate\Database\Connection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PostIndexAction
{
    public function __construct(
        private JsonRenderer $renderer,
        private Connection $connection,
    ) {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $posts = $this->connection->table('posts')->latest()->limit(3)->get();

        return $this->renderer->json($response, compact('posts'));
    }
}
