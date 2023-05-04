<?php

namespace mszl\core\tools;

use mszl\core\interface\QueueInterface;
use mszl\core\traits\MultitonTrait;

class Queue implements QueueInterface
{
    use MultitonTrait;

    public function test()
    {
        console("hello");
    }
}