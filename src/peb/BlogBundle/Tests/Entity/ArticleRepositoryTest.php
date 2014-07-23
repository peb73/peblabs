<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 23/07/2014
 * Time: 23:49
 */

namespace peb\BlogBundle\Tests\Entity;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleRepositoryTest extends WebTestCase{

    /**
     * Test find By Tag
     */
    public function testFindByTag()
    {
        $client = static::createClient();
        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $articleRepository = $em->getRepository('pebBlogBundle:Article');
        $articles = $articleRepository->findByTag('CSS');

        $this->assertEquals(5, sizeof($articles));
        foreach($articles as $article){
            $this->assertTrue(in_array('CSS',$article->getTags()));
        }
    }

} 