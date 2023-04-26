<?php

namespace mszl\core\middleware;

class ErrorHandlerMiddleware extends AbstractMiddleware
{

    public function handle($context, MiddlewareStack $stack)
    {
        try {
            return $stack->next($context);
        } catch (\Exception $e) {
            console($e->getTraceAsString());
        }
    }
}