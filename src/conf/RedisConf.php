<?php

namespace mszl\core\conf;

use mszl\core\tools\Entity;
use mszl\core\traits\SingletonInstanceTrait;

/**
 * @property mixed $host
 * @property mixed $port
 */
class RedisConf extends Entity
{
    use SingletonInstanceTrait;

    public static function instance(): RedisConf
    {
        $data = [
            'host' => '127.0.0.2'
        ];

        return new self($data);
    }
}