<?php

namespace mszl\core\traits;

trait MultitonTrait
{
    private static array $instances = [];

    public static function getInstance(string ...$alias)
    {
        $num = func_num_args();
        if ($num === 0) {
            $alias = [''];
        }
        foreach ($alias as $v) {
            if (!isset(self::$instances[$v])) {
                self::$instances[$v] = new self();
            }
        }
        return $num > 1 ? self::$instances : self::$instances[$alias[0]];
    }

    private function __construct() {}

    private function __clone() {}

}