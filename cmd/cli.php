<?php


use mszl\core\conf\RedisConf;

define('APP_PATH', realpath(dirname(__FILE__)));
require_once APP_PATH . '/../vendor/autoload.php';


$rs = RedisConf::getInstance();
var_dump($rs->host);
var_dump($rs->port);
exit;
phpinfo();