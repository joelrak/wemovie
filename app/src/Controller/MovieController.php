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
    public function index(MovieService $movieService): Response
    {
        return $this->render('movie/list.html.twig', [
            'listGrenres'   => $movieService->listMovieGender(),
        ] );
    }

    #[Route('/top_rated', name: 'top_rated_movie')]
    public function bestMovie(MovieService $movieService): Response
    {
        $listTopRated = $movieService->listBestMovies(['page' => 1]);
        return $this->json($listTopRated->results[0]);
    }
}
