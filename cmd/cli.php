<?php


define('APP_PATH', realpath(dirname(__FILE__)));
require_once APP_PATH . '/../vendor/autoload.php';
//
//phpinfo();

define('CAFILE', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'fullchain.pem');

$url = 'https://music.liyutong180220.top/';
$url = 'http://api.liyutong180220.top/';
//$url = 'www.baidu.com/';


$client = new \GuzzleHttp\Client();
$options = [
    'verify' => CAFILE,
    'timeout' => 3, // 请求超时时间
    'connect_timeout' => 1, // 连接建立超时时间
];

$confPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'conf' . DIRECTORY_SEPARATOR;// . DIRECTORY_SEPARATOR .
echo $confPath;
try {
//    $response = $client->request('GET', $url, $options);
//    echo $response->getStatusCode(), PHP_EOL;// 200
//    echo $response->getBody(), PHP_EOL;
    //ini to array
    $iniFile = $confPath . 'app1.ini';
    $rs = parse_ini_file($iniFile, true);
    if ($rs == false) {
        var_dump(error_get_last());
    }
    var_dump($rs);
    exit;
    //json to array
    $jsonFile = file_get_contents($confPath . 'app.json');
//    $rs = json_decode($jsonFile, true);
//    var_dump($rs, json_last_error());
    //pecl install toml
    //composer require krakjoe/toml
    //TOML 格式比 INI 更现代,也更强大,能表示更复杂的配置结构,toml PHP 扩展提供了便捷的 TOML 解析功能,可以很好地用于读取 TOML 配置并在 PHP 程序中使用其值。
    $rs = \Yosymfony\Toml\Toml::parseFile($confPath . 'app.toml');
//    var_dump($rs);
    //xml
    $xml = simplexml_load_file($confPath . 'app.xml');
//    $json = json_encode($xml);
//    $array = json_decode($json, TRUE);
//    var_dump($array);
    //yaml

    $value = \Symfony\Component\Yaml\Yaml::parseFile($confPath . 'app.yaml');
    var_dump($value['company']['departments']);
    $confReader = 111;
//    $confReader->parse();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo 'error:' . $e->getMessage(), PHP_EOL;
}


