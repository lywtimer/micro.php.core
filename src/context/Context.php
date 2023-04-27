<?php

    namespace mszl\core\context;

    interface Context
    {
        public function getRequest(): ContextRequest;

        public function setHeader(string $key, string|array|null $values, bool $replace = true): Context;

        public function setStatusCode(int $code);

        public function write(mixed $data);
    }