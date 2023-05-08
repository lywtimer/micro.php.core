<?php

namespace mszl\core\conf;

use mszl\core\attributes\RedisConfReaderAttribute;
use mszl\core\interface\ConfReaderInterface;
use mszl\core\tools\Entity;
use mszl\core\traits\SingletonInstanceTrait;
use ReflectionClass;

/**
 * @property mixed $host
 * @property mixed $port
 * @property mixed $timeout
 * @property mixed $password
 */
#[RedisConfReaderAttribute]
class RedisConf extends Entity
{
    use SingletonInstanceTrait;

    public static function instance(): RedisConf
    {
        $data = [];
        //使用反射 API 读取注解
        $reflection = new ReflectionClass(self::class);
        $attributes = $reflection->getAttributes(RedisConfReaderAttribute::class);
        foreach ($attributes as $attribute) {
            $instance = $attribute->newInstance();
            if ($instance instanceof ConfReaderInterface) {
                $conf = $instance->read();
                $data = json_decode($conf, true);
            }
        }
        return new self($data);
    }
}