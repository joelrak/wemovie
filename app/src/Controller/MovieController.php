<?php

namespace App\Controller;

use App\Services\MovieService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'movie')]
    public function index(MovieService $movieService): Response
    {
        return $this->render('movie/list.html.twig', [
            'movieGenres' => $movieService->listMovieGender()
        ] );
    }
}
