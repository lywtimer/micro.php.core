<?php

namespace mszl\core\attributes;

use Attribute;
use CoreInterfaceErrorHandler;

#[Attribute(Attribute::TARGET_CLASS)]
class AttributeErrorHandlerDb
{
    private string $class_name;

    /**
     * @param string $class_name
     */
    public function __construct(string $class_name)
    {
        $this->class_name = $class_name;
    }

    public function getHandler(): CoreInterfaceErrorHandler
    {
        return new $this->class_name;
    }
}