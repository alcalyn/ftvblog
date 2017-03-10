<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticlesControllerTest extends WebTestCase
{
    public function testgetArticles()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/articles');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testgetArticle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/articles/2');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
