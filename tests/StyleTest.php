<?php

namespace App\Tests;

use App\Entity\Movie;
use App\Entity\Style;
use PHPUnit\Framework\TestCase;

class StyleTest extends TestCase
{
    public function testMovieError(): void
    {
        $style = new Style();
        $this->assertTrue(is_a($style->getMovies()[0], Movie::class)); // error
    }
    public function testMovieAssert(): void
    {
        $style = new Style();
        $this->assertFalse(is_a($style->getMovies()[0], Movie::class)); // assert
    }

    public function testHaveMovieError(): void
    {
        $style = new Style();
        $movie = new Movie();
        $style->addMovie($movie);
        $this->assertTrue(count($style->getMovies()) == 0);
    }
    public function testHaveMovieAssert(): void
    {
        $style = new Style();
        $movie = new Movie();
        $style->addMovie($movie);
        $this->assertTrue(count($style->getMovies()) != 0);
    }
    
}
