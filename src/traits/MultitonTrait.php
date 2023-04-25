<?php

namespace mszl\core\traits;

trait MultitonTrait
{
    private static $instances = [];

    public static function getInstance($alias)
    {
        if (!isset(self::$instances[$alias])) {
            self::$instances[$alias] = new self();
        }

        return self::$instances[$alias];
    }

    private function __construct() {}

    private function __clone() {}

}