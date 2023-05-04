<?php

namespace mszl\core;

use mszl\core\tools\Queue;
use PHPUnit\Framework\TestCase;

class TestQueue extends TestCase
{
    public function testQueue()
    {
        Queue::getInstance()->test();
        $this->assertIsBool(true);
    }
}