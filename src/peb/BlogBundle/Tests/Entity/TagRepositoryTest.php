<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 03/10/2014
 * Time: 23:50
 */

namespace peb\BlogBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TagRepositoryTest extends WebTestCase{

    /**
     * Test find all
     */
    public function testGetAll()
    {
        $client = static::createClient();
        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $tagRepository = $em->getRepository('pebBlogBundle:Tag');
        $tags = $tagRepository->getAll();

        $this->assertEquals(6, sizeof($tags));
    }

    /**
     * Test find by label
     */
    public function testFindByLabel()
    {
        $client = static::createClient();
        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $tagRepository = $em->getRepository('pebBlogBundle:Tag');
        $tag = $tagRepository->findByLabel('CSS');

        $this->assertEquals('CSS',$tag->getLabel());

        $tagRepository = $em->getRepository('pebBlogBundle:Tag');
        $tag = $tagRepository->findByLabel('CSSNODEJAVA');

        $this->assertNull($tag);
    }

}