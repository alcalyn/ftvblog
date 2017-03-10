<?php

namespace FrontBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FrontControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Liste des articles")')->count()
        );
    }

    public function testArticle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article/il-reussit-a-sevader-du-labyrinthe-imprime-au-dos-de-son-paquet-de-cereales');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Il réussit à s’évader du labyrinthe imprimé au dos de son paquet de céréales")')->count()
        );
    }
}
