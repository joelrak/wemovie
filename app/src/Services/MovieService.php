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
        $uri        = $this->apiParams['url']['genre'];
        $listGenre  = $this->clientHelper->getResource($uri);

        //TODO use a class to represent Response
        return $listGenre;
    }

    public function listBestMovies($params=[])
    {
        $uri        = $this->apiParams['url']['best_movie'];
        $listGenre  = $this->clientHelper->getResource($uri, $params);

        //TODO use a class to represent Response
        return [
            'data'      => $listGenre,
            'base_url'  => $this->apiParams['images']['220x330']
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
        
        $uri        = str_replace('[movie_id]', $bestRated->id, $this->apiParams['url']['get_videos']);
        $videos     = $this->clientHelper->getResource($uri, []);
        $video      = reset($videos->results);
        $baseUrl    = $this->apiParams['videos']['tmdb'];
        if($video->site === 'YouTube'){
            $baseUrl    = $this->apiParams['videos']['youtube'];
            $videoUrl   = sprintf('%s/%s', $baseUrl, $video->key);
        }
        // $videoUrl = sprintf('%s?key=%s', $this->apiParams['videos']['tmdb'], reset($video->results)->key);
        
        //http://api.themoviedb.org/3/movie/157336?api_key=###&append_to_response=videos
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
        $uri = str_replace('[movie_id]', $movieId, $this->apiParams['url']['get_detail']);
        $movieDetail = $this->clientHelper->getResource($uri, []);

        return $movieDetail;
    }

    public function searchMovie($searcParams)
    {
        $uri    = $this->apiParams['url']['discover_movie'];
        $movies = $this->clientHelper->getResource($uri, array_merge([
                "api_key"=> "e5f20fc926600bd83597948e33545b7b",
                "with_watch_monetization_types" => "flatrate"
            ], $searcParams)
        );
        return $movies;
    }
}