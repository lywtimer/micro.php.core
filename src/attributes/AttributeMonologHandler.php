<?php

namespace mszl\core\attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class AttributeMonologHandler
{
    private string|array $class_name;

    /**
     * @param string|array $class_name
     */
    public function __construct(string|array $class_name)
    {
        $this->class_name = $class_name;
    }

    public function getHandler(): string|array
    {
        return $this->class_name;
    }
}