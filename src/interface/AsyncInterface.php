<?php

namespace mszl\core\interface;

interface AsyncInterface
{
    public function produce();

    public function consume();
}