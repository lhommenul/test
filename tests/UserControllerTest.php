<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'https://localhost:8000/user/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'User index');
    }
}
