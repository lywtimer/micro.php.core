<?php

    namespace mszl\core\context;

    use mszl\core\traits\SingletonTrait;
    use Symfony\Component\HttpFoundation\Response;

    class SymfonyHttpContext implements Context
    {
        use SingletonTrait;

        private SymfonyHttpContextRequest $r;
        private Response $w;

        public function __construct()
        {
            $this->w = new Response();
            $this->r = SymfonyHttpContextRequest::getInstance();
        }

        public function getRequest(): SymfonyHttpContextRequest
        {
            return $this->r;
        }

        public function setHeader(string $key, string|array|null $values, bool $replace = true): Context
        {
            $this->w->headers->set($key, $values, $replace);
            return $this;
        }

        public function write($data)
        {
            $this->w->setContent($data);
            $this->w->send();
        }

        public function setStatusCode(int $code)
        {
            $this->w->setStatusCode($code);
        }
    }