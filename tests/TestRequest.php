<?php

namespace mszl\core;

use mszl\core\middleware\TimeMiddleware;
use PHPUnit\Framework\TestCase;

class TestRequest extends TestCase
{
    public function testQuery()
    {
        $_GET['a'] = 123;
        $_GET['name'] = "小明";
        $_POST['username'] = "xiaoli";
        $_POST['passwd'] = "123456";
        $_COOKIE['auth'] = "kshfskdkfsdlfs";
        $_COOKIE['url'] = "localhost";
        $middlewares = [
            new TimeMiddleware(),
            new Demo()
        ];
        $result = Engine::getInstance()->addMiddleware(...$middlewares)->run();
        console($result);
        $this->assertIsBool(true);
    }
}