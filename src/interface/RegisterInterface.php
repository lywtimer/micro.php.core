<?php

namespace mszl\core\interface;

interface RegisterInterface
{
    public function registerService($serverName, $host, $port);

    public function getService($serverName);

    public function createClient(array $option);

    public function close();
}