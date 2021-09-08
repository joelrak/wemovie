<?php

namespace App\Controller;

use App\Services\MovieService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/movie")]
class MovieController extends AbstractController
{
    #[Route('/', name: 'list_movie')]
    public function homeList(MovieService $movieService): Response
    {
        $listTopRated   = $movieService->listBestMovies(['page' => 1]);
        $movieTopRated  = $movieService->getMovieTopRated($listTopRated['data']->results[0]->id, 'en_US');
        return $this->render('movie/home.html.twig', [
            'listGrenres'   => $movieService->listMovieGenre(),
            'bestMovies'    => $movieService->listBestMovies(),
            'movieTopRated' => $movieTopRated
        ] );
    }

    #[Route('/images/{movieId}', name: 'images_by_movie')]
    public function getMovieImages(MovieService $movieService, $movieId)
    {
        //TODO get images from ajax to complete card
        $images = $movieService->getMovieImages($movieId);

        return $this->json($images);
    }

    
    #[Route('/details/{movieId}', name: 'details_of_movie')]
    public function getMovieDetail(MovieService $movieService, $movieId)
    {
        $details = $movieService->getMovieDetails($movieId);
        return $this->json($details);
    }

    #[Route('/search', name: 'search_movie')]
    public function searchMovie(){
        //TODO launch search inside API TMDB
        return $this->json([]);
    }
}
