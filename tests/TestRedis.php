<?php

namespace mszl\core;

use PHPUnit\Framework\TestCase;

class TestRedis extends TestCase
{
    public function testQuery()
    {
        $client = new \Predis\Client([
            'scheme' => 'tcp',
            'host' => '8.142.149.58',
            'port' => 6379,
        ]);
        $rs = $client->ping();
        console($rs);
        $client->set('foo', 'bar');
        $value = $client->get('foo');
    }
}