<?php


namespace PAM;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use http\Encoding\Stream;
use Psr\Http\Client\ClientExceptionInterface;

class RechargeCard
{
    private Client $client;

    private array $clientConfig;

    private string $service;

    private string $url = '';

    private array $api = [
        'id' => null,
        'key' => null
    ];

    public function __construct($service = null, $apiID = null, $apiKey = null)
    {
        $service && $this->setService($service);
        $apiID && $this->setApiId($apiID);
        $apiKey && $this->setApikey($apiKey);
        $this->clientConfig = [];
        $this->init();
    }

    private function init()
    {
        $config = [];

        $config['base_uri'] = $this->url;

        $this->clientConfig = $config;
        $this->client = new Client($config);
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    public function getApiId(): string
    {
        return $this->api['id'];
    }

    public function getApiKey(): string
    {
        return $this->api['key'];
    }

    /**
     * @param string $service
     * @return RechargeCard
     */
    public function setService(string $service): RechargeCard
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url): RechargeCard
    {
        $this->url = $url;
        $this->init();
        return $this;
    }

    /**
     * @param $apiId
     * @return RechargeCard
     */
    public function setApiId($apiId): RechargeCard
    {
        $this->api['id'] = $apiId;
        return $this;
    }

    /**
     * @param $apiKey
     * @return RechargeCard
     */
    public function setApikey($apiKey): RechargeCard
    {
        $this->api['key'] = $apiKey;
        return $this;
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function sendRequest($method = 'GET', $uri = '', $options = []): \Psr\Http\Message\ResponseInterface
    {
        $client = new Client($this->clientConfig);
        return $client->request($method, $uri, $options);
    }

    public function service($name)
    {
        $class = "\\PAM\\Services\\" . $name . 'Service';
        if (class_exists($class)) {
            return new $class($this);
        } else {
            return null;
        }
    }

}
