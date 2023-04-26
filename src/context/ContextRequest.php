<?php

namespace mszl\core\context;

interface ContextRequest
{
    function getQuery($name = null, $default = null);

    function getPost($name = null, $default = null);

    function getCookie($name = null, $default = null);

    function getFiles($name = null, $default = null);

}