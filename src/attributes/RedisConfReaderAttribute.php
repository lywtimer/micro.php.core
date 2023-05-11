<?php

namespace mszl\core\attributes;

use alibaba\nacos\Nacos;
use Attribute;
use mszl\core\enum\ConfReaderTypeEnum;
use mszl\core\interface\ConfReaderInterface;

#[Attribute(Attribute::TARGET_CLASS)]
class RedisConfReaderAttribute implements ConfReaderInterface
{
    private string $readType = '';

    /**
     * @param string $readType
     */
    public function __construct(string $readType = '')
    {
        $this->readType = $readType;
    }

    public function read()
    {
        return match ($this->readType) {
            ConfReaderTypeEnum::nacos => $this->readFromNacos(),
            default => $this->readFromNacos()
        };
    }

    private function readFromNacos()
    {
    }
}