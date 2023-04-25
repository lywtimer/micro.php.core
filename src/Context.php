<?php

namespace mszl\core;

abstract class Context
{
    private $w;
    private $r;

    public function __construct($method, $url, $headers, $body)
    {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
    }

    abstract function getRequest();
    abstract function setHeader();
    abstract function write();
}