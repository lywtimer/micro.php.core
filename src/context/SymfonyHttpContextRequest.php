<?php

namespace mszl\core\context;

use mszl\core\traits\SingletonTrait;
use Symfony\Component\HttpFoundation\Request;

class SymfonyHttpContextRequest implements ContextRequest
{
//var_dump($request->request->all());
//var_dump($request->query->all());
//var_dump($request->getUri());
//var_dump($request->getPathInfo());
//var_dump($_SERVER["REQUEST_URI"]);
//$path = $request->getPathInfo();
    use SingletonTrait;

    private Request $r;

    public function __construct()
    {
        $this->r = Request::createFromGlobals();
    }

    function getQuery($name = null, $default = null): float|int|bool|array|string|null
    {
        return is_null($name) ? $this->r->query->all() : $this->r->query->get($name, $default);
    }

    function getPost($name = null, $default = null): string|array|bool|int|null|float
    {
        return is_null($name) ? $this->r->request->all() : $this->r->request->get($name, $default);
    }

    function getCookie($name = null, $default = null): string|array|bool|int|null|float
    {
        return is_null($name) ? $this->r->cookies->all() : $this->r->cookies->get($name, $default);
    }

    function getFiles($name = null, $default = null): string|int|bool|array|null|float
    {
        return is_null($name) ? $this->r->query->all() : $this->r->query->get($name, $default);
    }
}