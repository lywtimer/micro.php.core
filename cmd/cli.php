<?php


use mszl\core\conf\RedisConf;

define('APP_PATH', realpath(dirname(__FILE__)));
require_once APP_PATH . '/../vendor/autoload.php';


$rs = RedisConf::getInstance();
var_dump(\mszl\core\enum\ConfReaderTypeEnum::ini);
var_dump(\mszl\core\enum\ConfReaderTypeEnum::ini->name);
var_dump(\mszl\core\enum\ConfReaderTypeEnum::cases());

exit;
phpinfo();