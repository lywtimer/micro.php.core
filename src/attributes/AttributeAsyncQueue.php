<?php

namespace mszl\core\attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class AttributeAsyncQueue
{
    private string $queue;

    /**
     * @param string $queue
     */
    public function __construct(string $queue)
    {
        $this->queue = $queue;
    }
}