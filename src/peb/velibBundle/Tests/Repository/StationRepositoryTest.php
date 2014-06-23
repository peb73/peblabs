<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 18/06/2014
 * Time: 00:44
 */

namespace peb\velibBundle\Tests\Repository;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StationRepositoryTest extends WebTestCase{

    public function testGetStat(){
        $client = static::createClient();

        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $stationRepository = $em->getRepository('pebvelibBundle:Station');
        $stationRepository->getStats(9018);

        $this->assertTrue(true);
    }

} 