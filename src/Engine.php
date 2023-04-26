<?php

namespace mszl\core;

use mszl\core\context\Context;
use mszl\core\context\SymfonyHttpContext;
use mszl\core\middleware\MiddlewareInterface;
use mszl\core\middleware\MiddlewareStack;
use mszl\core\traits\MultitonTrait;


class Engine
{
    protected array $middlewares = [];
    protected $errorHandler = null;
    protected $register = null;
    protected $logger = null;
    protected ?Context $context = null;

    use MultitonTrait;

    public function addMiddleware(MiddlewareInterface ...$middleware): static
    {
        foreach ($middleware as $m) {
            $this->middlewares[] = $m;
        }
        return $this;
    }

    public function run(): mixed
    {
        if (!$this->getContext()) {
            $context = SymfonyHttpContext::getInstance();
            $this->setContext($context);
        }
        return (new MiddlewareStack($this->middlewares))->next($this->getContext());
    }

    /**
     * @return null
     */
    public function getErrorHandler()
    {
        return $this->errorHandler;
    }

    /**
     * @param null $errorHandler
     */
    public function setErrorHandler($errorHandler): void
    {
        $this->errorHandler = $errorHandler;
    }

    /**
     * @return null
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @param null $register
     */
    public function setRegister($register): void
    {
        $this->register = $register;
    }

    /**
     * @return null
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * @param null $logger
     */
    public function setLogger($logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @return null
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param null $context
     */
    public function setContext($context): void
    {
        $this->context = $context;
    }


}
