<?php

namespace mszlu\core\middleware;

interface MiddlewareInterface
{
    public function handle($request, MiddlewareStack $stack);
    public function onException($e);
}