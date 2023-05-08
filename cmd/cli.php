<?php


define('APP_PATH', realpath(dirname(__FILE__)));
require_once APP_PATH . '/../vendor/autoload.php';
//
//phpinfo();
//
//exit;
//$rs = RedisConf::getInstance();
//var_dump($rs);
//var_dump(\mszl\core\enum\ConfReaderTypeEnum::ini);
//var_dump(\mszl\core\enum\ConfReaderTypeEnum::ini->name);
//var_dump(\mszl\core\enum\ConfReaderTypeEnum::cases());


//$url = "https://liyutong180220.top/nacos/v1/cs/configs?tenant=&dataId=com.lywtimer.conf.redis&group=CONFIG_GROUP";
//
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//$result = curl_exec($ch);

$nacos = new \mszl\core\nacos\NacosClient([
    'server_addresses' => 'liyutong180220.top',
    'protocol' => 'https://',
]);
$result = $nacos->getConfig('com.lywtimer.conf.redis', 'CONFIG_GROUP');
var_dump($result);
exit;
