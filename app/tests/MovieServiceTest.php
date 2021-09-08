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

        $this->assertIsObject($bestMovies);
        $this->assertObjectHasAttribute("page", $bestMovies);
        $this->assertObjectHasAttribute("results", $bestMovies);
        $this->assertIsArray($bestMovies->results);
        $this->assertGreaterThanOrEqual(0, $bestMovies->results);
    }

    public function testOneTopRatedMovie(){
        $bestMovies = $this->movieService->listBestMovies(['page' => 1]);
        $oneTopRated = $bestMovies->results[0];

        $this->assertIsObject($bestMovies);
        $this->assertObjectHasAttribute("results", $bestMovies);
        $this->assertIsObject($oneTopRated);
        $this->assertObjectHasAttribute('id', $oneTopRated);
        $this->assertObjectHasAttribute('original_title', $oneTopRated);
        $this->assertObjectHasAttribute('title', $oneTopRated);
        $this->assertObjectHasAttribute('poster_path', $oneTopRated);
    }
}