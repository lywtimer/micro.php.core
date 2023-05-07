<?php

namespace mszl\core;

use PHPUnit\Framework\TestCase;

class TestRedis extends TestCase
{
    public function testConnect()
    {
        $connect = true;
        try {
            $client = new \Predis\Client([
                'scheme' => 'tcp',
                'host' => '',
                'port' => 6379,
            ]);
            $client->auth("");
            $rs = $client->ping();
            console($rs . "");

            $client->set('foo', 'bar');
            $value = $client->get('foo');
            console($value);
        } catch (\Exception $e) {
            $connect = false;
            console("predis connect error : " . $e->getMessage());
        }

        try {
            $redis = new \Redis();
            $redis->connect("");
            $redis->auth("");
            $rs = $redis->ping();
            console($rs);
            $redis->hSet("cart:1001", "name", "xiaoming");
        } catch (\Exception $e) {
            $connect = false;
            console("redis connect error : " . $e->getMessage());
        }

        $this->assertIsBool($connect);
    }
}