<?php

namespace mszl\core;

use mszl\core\middleware\AbstractMiddleware;
use mszl\core\middleware\MiddlewareStack;

class TestMiddleware extends \PHPUnit\Framework\TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true);
    }
}
//
//class TimeMiddleware extends AbstractMiddleware
//{
//    public function handle($request, MiddlewareStack $stack)
//    {
//        $start = microtime(true);
//
//        $response = $stack->next($request);
//
//        $end = microtime(true);
//        $time = $end - $start;
//
//        echo sprintf('Request time: %s sec' . PHP_EOL, $time);
//
//        return $response;
//    }
//
//}
//
//class ErrorHandlerMiddleware extends AbstractMiddleware
//{
//    public function handle($request, MiddlewareStack $stack)
//    {
//        echo "我处理了业务程序", PHP_EOL;
//        usleep(100 * 215);
//        return $stack->next($request);
//    }
//}
//
//class OrderMiddleware extends AbstractMiddleware
//{
//
//    public function handle($request, MiddlewareStack $stack)
//    {
//        // TODO: Implement handle() method.
//        echo "我处理了订单业务", PHP_EOL;
//        throw new \Exception("我执行超时了");
//        return $stack->next($request);
//    }
//}
//
//$middlewares = [
//    new TimeMiddleware(),
//    new ErrorHandlerMiddleware()
//];
//
//\mszlu\core\Engine::getInstance("")->addMiddleware(...$middlewares)->run();