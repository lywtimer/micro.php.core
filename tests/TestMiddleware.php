<?php

namespace mszl\core;

use mszl\core\middleware\ErrorHandlerMiddleware;
use mszl\core\middleware\TimeMiddleware;
use PHPUnit\Framework\TestCase;

class TestMiddleware extends TestCase
{
    public function testEngineCreate()
    {
        $engines = Engine::getInstance('a', 'b', 'c');
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





