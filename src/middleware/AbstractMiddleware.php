<?php

namespace mszl\core\middleware;

abstract class AbstractMiddleware implements MiddlewareInterface
{
    public function onException($e)
    {
        if (PHP_SAPI == "cli") {
            $stdout = STDOUT;
        } else {
            $stdout = fopen('php://stdout', 'w');
        }
        fwrite($stdout, $e->getMessage() . PHP_EOL);
    }
}
