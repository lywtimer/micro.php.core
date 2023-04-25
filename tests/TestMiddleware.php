<?php

namespace mszl\core;

use Exception;
use mszl\core\middleware\AbstractMiddleware;
use mszl\core\middleware\MiddlewareStack;
use PHPUnit\Framework\TestCase;

class TestMiddleware extends TestCase
{
    public function testEngine()
    {
        $middlewares = [
            new TimeMiddleware(),
            new ErrorHandlerMiddleware()
        ];
        var_dump(111111);
        Engine::getInstance("")->addMiddleware(...$middlewares)->run();
        $this->assertTrue(true);
    }
}

class TimeMiddleware extends AbstractMiddleware
{
    public function handle($request, MiddlewareStack $stack)
    {
        $start = microtime(true);

        $response = $stack->next($request);

        $end = microtime(true);
        $time = $end - $start;

        echo sprintf('Request time: %s sec' . PHP_EOL, $time);

        return $response;
    }

}

class ErrorHandlerMiddleware extends AbstractMiddleware
{
    /**
     * @throws Exception
     */
    public function handle($request, MiddlewareStack $stack)
    {
        echo "我处理了业务程序", PHP_EOL;
        usleep(100 * 215);
        if (rand(0, 1)) throw new Exception("我执行超时了");
        return $stack->next($request);
    }
}

