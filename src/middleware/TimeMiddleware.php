<?php

namespace mszl\core\middleware;

class TimeMiddleware extends AbstractMiddleware
{
    public function handle($context, MiddlewareStack $stack)
    {
        $start = microtime(true);
        $m = memory_get_usage(true);
        $response = $stack->next($context);

        $end = microtime(true);
        $time = $end - $start;
        $memory = memory_get_usage(true) - $m;

        console(sprintf('exec time: %s  memory: %s' . PHP_EOL, readableTime($time), readableBytes($memory)));

        return $response;
    }
}