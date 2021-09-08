<?php
namespace App\Tests;

use App\Services\MovieService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MovieServiceTest extends KernelTestCase
{
    /**@var MovieService $movieService*/
    private $movieService;
    
    protected function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $this->movieService = $container->get(MovieService::class);
    }
    
    public function testListMovieGenre()
    {
        $genres = $this->movieService->listMovieGenre();

        $this->assertIsObject($genres);
        $this->assertObjectHasAttribute("genres", $genres);
    }

    public function testBestMovies()
    {
        $bestMovies = $this->movieService->listBestMovies([]);
        
        $this->assertIsArray($bestMovies);
        $this->assertIsObject($bestMovies['data']);
        $this->assertObjectHasAttribute("page", $bestMovies['data']);
        $this->assertObjectHasAttribute("results", $bestMovies['data']);
        $this->assertIsArray($bestMovies['data']->results);
        $this->assertGreaterThanOrEqual(0, $bestMovies['data']->results);
    }

    public function testOneTopRatedMovie()
    {
        $bestMovies = $this->movieService->listBestMovies(['page' => 1]);
        $oneTopRated = $bestMovies['data']->results[0];

        $this->assertIsArray($bestMovies);
        $this->assertIsObject($bestMovies['data']);
        $this->assertObjectHasAttribute("results", $bestMovies['data']);
        $this->assertIsObject($oneTopRated);
        $this->assertObjectHasAttribute('id', $oneTopRated);
        $this->assertObjectHasAttribute('original_title', $oneTopRated);
        $this->assertObjectHasAttribute('title', $oneTopRated);
        $this->assertObjectHasAttribute('poster_path', $oneTopRated);
    }

    public function testVideoUrlInsideOneTopRatedMovie()
    {
        $topRated = $this->movieService->getMovieTopRated();

        $this->assertIsArray($topRated);
        $this->assertArrayHasKey("detail", $topRated);
        $this->assertArrayHasKey("video", $topRated);
        $this->assertIsObject($topRated['detail']);
        $this->assertGreaterThanOrEqual(0, count($topRated['detail']));
        $this->assertIsObject($topRated['video']);
        $this->assertNotEmpty($topRated['videoUrl']);

    }
}