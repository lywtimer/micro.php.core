<?php

namespace mszl\core\middleware;

class MiddlewareStack
{
    protected array $middlewares = [];

    public function __construct(array $middlewares)
    {
        $this->middlewares = $middlewares;
    }

    public function next($context): mixed
    {

        if (empty($this->middlewares)) {
            return null;
        }
        /**
         * @var $middleware MiddlewareInterface
        */
        $middleware = array_shift($this->middlewares);

        try {
            return $middleware->handle($context, $this);
        } catch (\Exception $e) {
            $middleware->onException($e);

            return $this->next($request);
        }
    }
}