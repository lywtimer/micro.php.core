<?php

namespace mszl\core\attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class AttributeIniReader
{
    private string $file;
    private string $section;

    /**
     * @param string $file
     * @param string $section
     */
    public function __construct(string $file, string $section)
    {
        $this->file = $file;
        $this->section = $section;
    }
}