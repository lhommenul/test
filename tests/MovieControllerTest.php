<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MovieControllerTest extends WebTestCase
{

    // TESTS FONCTIONNELS

    // Test affichage de la page /movie
    public function testMovie(): void
    {   

        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', 'https://localhost:8000/movie/');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Movie index');

    }

    // Test affichage de la page /movie/new
    public function testAddMovie(): void
    {   
        $client = static::createClient();
        $client->request('GET', 'https://localhost:8000/movie/new');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Create new Movie');
    }

}
