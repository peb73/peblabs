<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 03/10/2014
 * Time: 23:50
 */

namespace peb\BlogBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryRepositoryTest extends WebTestCase{

    /**
     * Test find all
     */
    public function testFindAll()
    {
        $client = static::createClient();
        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $categoryRepository = $em->getRepository('pebBlogBundle:Category');
        $categories = $categoryRepository->findAll();

        $this->assertEquals(4, sizeof($categories));
    }

    /**
     * Test find by url
     */
    public function testFindByUrl()
    {
        $client = static::createClient();
        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $categoryRepository = $em->getRepository('pebBlogBundle:Category');
        $category = $categoryRepository->findByUrl('cat-2');

        $this->assertEquals('cat-2',$category->getUrlName());
    }

} 