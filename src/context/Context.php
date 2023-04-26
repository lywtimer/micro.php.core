<?php

namespace mszl\core\context;

interface Context
{
    function getRequest();
    function setHeader(string $key, string|array|null $values, bool $replace = true):Context;
    function setStatusCode(int $code);
    function write(mixed $data);
}