<?php

namespace mszl\core;

use alibaba\nacos\Nacos;
use alibaba\nacos\NacosConfig;
use PHPUnit\Framework\TestCase;

class TestRegister extends TestCase
{
    public function testConnect()
    {

        $host = 'http://192.168.12.180:8848/';
        NacosConfig::setHost($host);
        $times = 1;
        while (true) {
            if ($times > 100) break;
            $rs = Nacos::init($host, 'dev', 'com.conf', 'DEFAULT_GROUP', '')->runOnce();
            $times++;
        }
        console(json_decode($rs)->host);
        $this->assertIsBool(true);
    }
}