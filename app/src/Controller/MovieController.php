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
        return $this->render('movie/home.html.twig', [
            'listGrenres'   => $movieService->listMovieGenre(),
            'bestMovies'    => $movieService->listBestMovies()
        ] );
    }

    #[Route('/top_rated', name: 'top_rated_movie')]
    public function bestMovie(MovieService $movieService): Response
    {
        $listTopRated = $movieService->listBestMovies(['page' => 1]);
        $movieService->getMovieVideos($listTopRated->results[0]->id);
        return $this->json([]);
    }
}
