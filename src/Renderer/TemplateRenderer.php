<?php

namespace App\Renderer;

use Latte\Engine;
use Psr\Http\Message\ResponseInterface;

final class TemplateRenderer
{
    private Engine $engine;

    public function __construct(Engine $engine)
    {
        $this->engine = $engine;
    }

    public function template(
        ResponseInterface $response,
        string $template,
        array $data = [],
    ): ResponseInterface {
        $string = $this->engine->renderToString($template, $data);
        $response->getBody()->write($string);

        return $response;
    }
}
