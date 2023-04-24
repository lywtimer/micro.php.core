<?php

namespace mszlu\memory;

use mszlu\memory\traits\MultitonTrait;

class Engine
{
    use MultitonTrait;

    public function run()
    {
        echo "I'm coming";
    }
}