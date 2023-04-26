<?php

namespace mszl\core\middleware;

abstract class AbstractMiddleware implements MiddlewareInterface
{
    public function onException($e)
    {
        console($e->getMessage() . PHP_EOL);
    }
}
