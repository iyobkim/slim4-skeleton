<?php

namespace App\Action\Api\User;

use App\Renderer\JsonRenderer;
use Illuminate\Database\Connection;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class UserIndexAction
{
    public function __construct(
        private JsonRenderer $renderer,
        private Connection $connection,
    ) {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $users = $this->connection->table('users')->get();

        return $this->renderer->json($response, compact('users'));
    }
}
