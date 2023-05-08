<?php

namespace mszl\core\nacos;

use GuzzleHttp\Client;

class NacosClient
{
    private $server_addresses;
    private $namespace;
    private $protocol;
    private $accessToken;

    public function __construct($config)
    {
        $this->protocol = $config['protocol'] ?? 'http://';
        $this->server_addresses = $config['server_addresses'];
        $this->namespace = $config['namespace'] ?? '';
    }

    public function getConfig($data_id, $group = 'DEFAULT_GROUP')
    {
        $url = $this->protocol . $this->server_addresses . "/nacos/v1/cs/configs";
        $params = [
            'dataId' => $data_id,
            'group' => $group
        ];
        $response = $this->httpGet($url, $params);
        return $response;
    }

    public function publishConfig($data_id, $group, $content)
    {
        $url = $this->protocol . $this->server_addresses . "/nacos/v1/cs/configs";
        $params = [
            'dataId' => $data_id,
            'group' => $group,
            'content' => $content
        ];
        $this->httpPost($url, $params);
    }

    private function httpGet($url, $params)
    {
        $url = $url . "?" . http_build_query($params);
        $options = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
            'http' => [
                'method' => 'Get',
                'timeout' => 5,
            ],

        ];
        $context = stream_context_create($options);


        $client = new Client();
        $response = $client->get($url, $options);
//        $response = file_get_contents($url, false, $context);

        return [
            'code' => $response->getStatusCode(),
            'data' => $response->getBody(),
        ];
    }

    public function login($username, $password)
    {
        $url = $this->protocol . $this->server_addresses . "/nacos/v1/auth/login";
        $params = [
            'username' => $username,
            'password' => $password
        ];
        $response = $this->httpPost($url, $params);
        $this->accessToken = $response['accessToken'];
    }

    private function httpPost($url, $params)
    {
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($params)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
    }
}