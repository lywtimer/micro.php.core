<?php

namespace mszl\core\traits;

trait SingletonInstanceTrait
{
    private static $instance = null;

    public static function getInstance(...$args): static
    {
        if (self::$instance === null) {
            if (method_exists(static::class, 'instance')) {
                self::$instance = static::instance(...$args);
            } else {
                self::$instance = new static(...$args);
            }
        }

        return self::$instance;
    }

    private function __clone()
    {
    }
}