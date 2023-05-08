<?php

namespace mszl\core\tools;

use CoreInterfaceAsync;
use mszl\core\attributes\AttributeAsyncQueue;

/**
 * 不能使用带有构造参数的类
 */
trait CoreTraitAsync
{

    /**
     * @throws Exception
     */
    private static function _async()
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2);
        $callSelf = $trace[0];
        $call = $trace[1];
        $args = $call['args'] ?: $callSelf['args'];
        $class = __CLASS__;
        $call_fun = self::_call_fun($call['function']);
        $callback = $call['type'] === '->' ? [new $class, $call_fun] : [$class, $call_fun];

        //解析当前方法/类的注解
        $reflection = new ReflectionClass($class);
        $allAttributes = [$reflection->getMethod($call['function'])->getAttributes(), $reflection->getAttributes()];
        foreach ($allAttributes as $attributes) {
            foreach ($attributes as $attribute) {
                $instance = $attribute->newInstance();
                //加入队列
                if ($instance instanceof AttributeAsyncQueue) {
                    $queueClass = current($attribute->getArguments());
                    if ($queueClass) {
                        $queueInstance = new $queueClass;
                        if ($queueInstance instanceof CoreInterfaceAsync) {
                            $queueInstance::produce($callback, $args);
                            return;
                        }
                    }
                }
            }
        }

        call_user_func_array($callback, $args);
    }

    /**
     * @throws Exception
     */
    private static function _call_fun($fun)
    {
        $call_fun = '_async_' . $fun;
        if (!method_exists(__CLASS__, $call_fun)) throw new Exception('there is no ' . $call_fun . ' method');
        return $call_fun;
    }

}