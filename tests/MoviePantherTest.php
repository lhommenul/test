<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class MoviePantherTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $client->request('GET', 'https://localhost:8000/movie/');

        $this->assertSelectorTextContains('h1', 'Movie index');
    }


    public function testAddingFilm(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', 'https://localhost:8000/movie/new');

        $form = $crawler->selectButton('Save')->form([
            'movie[name]'                       => 'Yes Man',
            'movie[description]'                => 'Un film positif',
            'movie[release_date][date][month]'  => '5',
            'movie[release_date][date][day]'    => '24',
            'movie[release_date][date][year]'   => '2016',
            'movie[styles][]'                   => '17',// Entre 17 et 20
        ]);
        $client->submit($form);
    }
}
