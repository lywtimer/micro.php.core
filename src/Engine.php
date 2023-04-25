<?php

namespace mszlu\core;

use mszlu\core\middleware\MiddlewareInterface;
use mszlu\core\middleware\MiddlewareStack;
use mszlu\core\traits\MultitonTrait;


class Engine
{
    protected ?MiddlewareStack $middlewareStack = null;
    protected array $middlewares = [];

    use MultitonTrait;

    public function addMiddleware(MiddlewareInterface ...$middleware): static
    {
        foreach ($middleware as $m) {
            $this->middlewares[] = $m;
        }
        return $this;
    }

    public function run(): void
    {
        (new MiddlewareStack($this->middlewares))->next([]);
    }
}
