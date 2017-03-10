<?php

namespace FrontBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FrontControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

    public function testArticle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/{slug}');
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/creer');
    }

}
