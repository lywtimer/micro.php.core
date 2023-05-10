<?php


define('APP_PATH', realpath(dirname(__FILE__)));
require_once APP_PATH . '/../vendor/autoload.php';
//
//phpinfo();

define('CAFILE', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'fullchain.pem');

$url = 'https://music.liyutong180220.top/';
//$url = 'www.baidu.com/';


$client = new \GuzzleHttp\Client();
$options = [
    'verify' => CAFILE,
    'timeout' => 3, // 请求超时时间
    'connect_timeout' => 1, // 连接建立超时时间
];

try {
    $response = $client->request('GET', $url, $options);
    echo $response->getStatusCode(), PHP_EOL;// 200
    echo $response->getBody(), PHP_EOL;
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo 'error:' . $e->getMessage(), PHP_EOL;
}


