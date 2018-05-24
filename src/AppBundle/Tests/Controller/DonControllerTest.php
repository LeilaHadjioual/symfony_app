<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DonControllerTest extends WebTestCase
{
    public function testFairedon()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/faireDon');
    }

}
