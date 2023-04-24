<?php

namespace mszlu\memory;

use mszlu\memory\traits\MultitonTrait;

class Engine
{

    private array $middlewares = [];
    protected $context;

    use MultitonTrait;

    public function run()
    {
        echo "I'm coming";
    }
}