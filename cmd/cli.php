<?php


define('APP_PATH', realpath(dirname(__FILE__)));
require_once APP_PATH . '/../vendor/autoload.php';
//
//phpinfo();

define('CAFILE', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'fullchain.pem');

$url = 'https://nacos.liyutong180220.top/';
//$url = 'www.baidu.com/';


\mszl\core\tools\Http::get();



