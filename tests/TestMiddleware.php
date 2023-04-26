<?php

namespace mszl\core;

use Exception;
use mszl\core\context\Context;
use mszl\core\middleware\AbstractMiddleware;
use mszl\core\middleware\MiddlewareStack;
use mszl\core\middleware\TimeMiddleware;
use mszl\core\middleware\ErrorHandlerMiddleware;
use PHPUnit\Framework\TestCase;

class TestMiddleware extends TestCase
{
    public function testEngineCreate()
    {
        $engines = Engine::getInstance('a','b','c');
        $this->assertIsArray($engines);
        $engine = Engine::getInstance();
        $this->assertInstanceOf(Engine::class, $engine, 'what?');
        $engine = Engine::getInstance();
        $this->assertInstanceOf(Engine::class, $engine, 'what?');
        $engine = Engine::getInstance('a');
        $this->assertInstanceOf(Engine::class, $engine, 'what?');
    }

    public function testMiddleware()
    {
        $middlewares = [
            new TimeMiddleware(),
            new ErrorHandlerMiddleware()
        ];
        $engine = Engine::getInstance()->addMiddleware(...$middlewares);
        $this->assertInstanceOf(Engine::class, $engine, 'what?');
    }

    public function testContext()
    {
        $middlewares = [
            new TimeMiddleware(),
            new Demo()
        ];
        $result = Engine::getInstance()->addMiddleware(...$middlewares)->run();
        console($result);

        $this->assertIsBool(true);
    }
}

Class Demo extends AbstractMiddleware
{

    public function handle(Context $context, MiddlewareStack $stack): string
    {
        $request = $context->getRequest();
        console("demo exec" . json_encode($request));
        return "hello";
    }
}



