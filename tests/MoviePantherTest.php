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
}
