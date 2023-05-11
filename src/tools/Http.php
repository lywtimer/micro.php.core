<?php

namespace mszl\core\tools;

use mszl\core\traits\SingletonInstanceTrait;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;


/**
 *
 */
class Http
{
    use SingletonInstanceTrait;

    const MethodGet = 'GET';
    const MethodHead = 'HEAD';
    const MethodPost = 'POST';
    const MethodPut = 'PUT';
    const MethodPatch = 'PATCH';
    const MethodDelete = 'DELETE';
    const MethodConnect = 'CONNECT';
    const MethodOptions = 'OPTIONS';
    const MethodTrace = 'TRACE';

    private ?ClientInterface $client = null;
    private ?ResponseInterface $response = null;
    private string $url = '';
    private array $params = [];
    private array $options = [];

    public static function instance(): Http
    {
        $instance = new self();
        $instance->client = new \GuzzleHttp\Client();
        return $instance;
    }
    
    public static function get()
    {
        return self::query(self::MethodGet);
    }

    private static function query($method)
    {
        $instance = self::getInstance();
        $url = match ($method) {
            default => $instance->buildParams()
        };

    }

    private function buildParams(): static
    {
        if ($this->params) {
            $this->url .= "?" . http_build_query($this->params);
        }
        return $this;
    }


    public function new()
    {
        $client = new \GuzzleHttp\Client();
        $host = 'https://nacos.liyutong180220.top';
        $options = [
            'verify' => CAFILE,
            'timeout' => 3, // 请求超时时间
            'connect_timeout' => 1, // 连接建立超时时间
        ];
        $url = $host . "/nacos/v1/cs/configs";
        $dataId = 'com.lywtimer.conf.redis'; // com.conf
        $group = 'DEFAULT_GROUP'; //DEFAULT_GROUP CONFIG_GROUP
        $params = [
            'dataId' => $dataId,
            'group' => $group
        ];
        try {
            $response = $client->request('GET', $url . "?" . http_build_query($params), $options);
            echo $response->getStatusCode(), PHP_EOL;// 200
            echo $response->getBody(), PHP_EOL;
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo 'error:' . $e->getMessage(), PHP_EOL;
        }
    }
}