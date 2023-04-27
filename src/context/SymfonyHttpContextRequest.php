<?php

    namespace mszl\core\context;

    use mszl\core\traits\SingletonTrait;
    use Symfony\Component\HttpFoundation\Request;

    class SymfonyHttpContextRequest implements ContextRequest
    {
        use SingletonTrait;

        private Request $r;

        public function __construct()
        {
            $this->r = Request::createFromGlobals();
        }

        public function getQuery($name = null, $default = null): float|int|bool|array|string|null
        {
            return is_null($name) ? $this->r->query->all() : $this->r->query->get($name, $default);
        }

        public function getPost($name = null, $default = null): string|array|bool|int|null|float
        {
            return is_null($name) ? $this->r->request->all() : $this->r->request->get($name, $default);
        }

        public function getCookie($name = null, $default = null): string|array|bool|int|null|float
        {
            return is_null($name) ? $this->r->cookies->all() : $this->r->cookies->get($name, $default);
        }

        public function getFiles($name = null, $default = null): string|int|bool|array|null|float
        {
            return is_null($name) ? $this->r->query->all() : $this->r->query->get($name, $default);
        }

        public function getPathInfo(): string
        {
            return $this->r->getPathInfo();
        }

        public function getMethod(): string
        {
            return $this->r->getMethod();
        }
    }