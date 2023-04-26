<?php

namespace mszl\core;

use mszl\core\context\Context;
use mszl\core\middleware\AbstractMiddleware;
use mszl\core\middleware\MiddlewareStack;

class Demo extends AbstractMiddleware
{

    public function handle(Context $context, MiddlewareStack $stack): string
    {
        $request = $context->getRequest();
        $response = [
            'query' => $request->getQuery(),
            'name' => $request->getQuery('name1', "default error"),
            'post' => $request->getPost(),
            'passwd' => $request->getPost('passwd'),
            'cookie' => $request->getCookie(),
        ];
        console("demo exec" . json_encode($response, JSON_UNESCAPED_UNICODE));
        return "hello";
    }
}