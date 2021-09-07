<?php

namespace App\Services;

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClientHelper
{
    private $client;
    private $apiBaseUrl;
    private $apikey;
    public function __construct(HttpClientInterface $client, $moviedbApi)
    {
        $this->client       = $client;
        $this->apiBaseUrl   = $moviedbApi['url']['base'];
        $this->apikey       = $moviedbApi['key'];
    }

    public function getResource($partialUrl, $params=[]):object
    {
        $response = $this->client->request('GET', "$this->apiBaseUrl$partialUrl", [
            'query'=> array_merge($params, [
                'api_key' => $this->apikey
            ])
        ]);
        $data = json_decode($response->getContent());
        if(property_exists($data, 'success') && $data->success === false){
            throw new ResourceNotFoundException($data->status_message);
        }

        return $data;
    }
}