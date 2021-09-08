<?php

namespace App\Services;

use App\Model\GenreResponse;
use App\Model\MovieResponse;

class MovieService
{
    private $clientHelper;
    private $apiParams;


    public function __construct(ApiClientHelper $helper, $moviedbApi)
    {
        $this->apiParams    = $moviedbApi;
        $this->clientHelper = $helper;
    }
    

    public function listMovieGenre()
    {
        $uri = $this->apiParams['url']['genre'];
        $listGenre = $this->clientHelper->getResource($uri);

        //TODO use a class to represent Response
        return $listGenre;
    }

    public function listBestMovies($params=[])
    {
        $uri = $this->apiParams['url']['best_movie'];
        $listGenre = $this->clientHelper->getResource($uri, $params);

        //TODO use a class to represent Response
        return [
            'data' => $listGenre,
            'base_url' => $this->apiParams['images']['220x330']
        ];
    }

    public function getMovieTopRated()
    {
        $uri = $this->apiParams['url']['discover_movie'];
        $movies = $this->clientHelper->getResource($uri, [
            'sort_by'               => 'vote_average.desc',
            'certification_country' => 'US'
        ]);
        $bestRated=null;
        $video = null;
        if($movies && count($movies->results) > 0){
            $bestRated = reset($movies->results);
        }
        
        $uri = str_replace('[movie_id]', $bestRated->id, $this->apiParams['url']['get_videos']);
        $video = $this->clientHelper->getResource($uri, []);
        $videoUrl = sprintf('%s?key=%s', $this->apiParams['videos']['tmdb'], reset($video->results)->key);
        
        //TODO if movie has no video, get the image instead of video getMovieImages

        //TODO use a class to represent Response
        return [
            'detail'            => $bestRated,
            'video'             => $video,
            'videoUrl'          => $videoUrl
        ];
    }

    public function getMovieImages($movieId)
    {
        $uri = str_replace('[movie_id]', $movieId, $this->apiParams['url']['get_images']);
        $images = $this->clientHelper->getResource($uri, []);

        //TODO use a class to represent Response
        return $images;
    }

    public function getMovieDetails($movieId)
    {
        return [];
    }
}