<?php

namespace App\Services;

class MovieService
{
    private $clientHelper;
    private $apiParams;

    public function __construct(ApiClientHelper $helper, $moviedbApi)
    {
        $this->apiParams    = $moviedbApi;
        $this->clientHelper = $helper;
    }
    
    public function listMovieGenre():object
    {
        $uri = $this->apiParams['url']['genre'];
        $listGenre = $this->clientHelper->getResource($uri);

        return $listGenre;
    }

    public function listBestMovies($params=[]):object
    {
        $uri = $this->apiParams['url']['best_movie'];
        $listGenre = $this->clientHelper->getResource($uri, $params);

        return $listGenre;
    }

    public function getMovieVideos($movieId)
    {
        $uri = str_replace('[movie_id]', $movieId, $this->apiParams['url']['get_videos']);
        $videos = $this->clientHelper->getResource($uri);
        dd($videos);
    }
}