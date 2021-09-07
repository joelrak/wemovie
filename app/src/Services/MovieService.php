<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MovieService
{
    private $client;
    private $apiParams;

    public function __construct(HttpClientInterface $client, $moviedbApi)
    {
        $this->apiParams    = $moviedbApi;
        $this->client       = $client;
    }
    public function listMovieGender(){
        $uri = sprintf('%s%s?api_key=%s', $this->apiParams['url']['base'], $this->apiParams['url']['genre'], $this->apiParams['key']);
        $response = $this->client->request(
            'GET',
            $uri
        );

        $listGenre = [];
        if($response){
            $listGenre = json_decode($response->getContent());
        }

        return $listGenre;
    }
}