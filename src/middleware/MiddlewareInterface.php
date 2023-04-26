<?php

namespace mszl\core\middleware;

use mszl\core\context\Context;

interface MiddlewareInterface
{
    public function handle(Context $context, MiddlewareStack $stack);
    public function onException($e);
}