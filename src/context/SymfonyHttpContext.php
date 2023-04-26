<?php

namespace mszl\core\context;

use mszl\core\traits\SingletonTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SymfonyHttpContext implements Context
{
    use SingletonTrait;
    private Request $r;
    private Response $w;

    public function __construct()
    {
        $this->w = new Response();
        $this->r = Request::createFromGlobals();
    }

    function getRequest(): Request
    {
        return Request::createFromGlobals();
    }

    function setHeader(string $key, string|array|null $values, bool $replace = true): Context
    {
        $this->w->headers->set($key, $values, $replace);
        return $this;
    }

    function write($data)
    {
        $this->w->setContent($data);
        $this->w->send();
    }

    function setStatusCode(int $code)
    {
        $this->w->setStatusCode($code);
    }
}