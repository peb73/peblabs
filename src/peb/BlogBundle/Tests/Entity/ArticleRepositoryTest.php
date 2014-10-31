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

        function is_in_tags($tagLabel,$tags){
            foreach($tags as $tag){
                if($tagLabel == $tag->getLabel())
                    return true;
            }
            return false;
        }

        foreach($articles as $article){
            $this->assertTrue(is_in_tags('CSS',$article->getTags()));
        }
    }

    /**
     * Test find By Category Url
     */
    public function testGetPublishByCategoryUrl()
    {
        $client = static::createClient();
        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $articleRepository = $em->getRepository('pebBlogBundle:Article');
        $articles = $articleRepository->getPublishByCategoryUrl('cat-1');

        $this->assertEquals(2, sizeof($articles));
        foreach($articles as $article){
            $this->assertEquals('cat-1',$article->getCategory()->getUrlName());
        }
    }

    /**
     * Test find By Tag label
     */
    public function testGetPublishByTagLabel()
    {
        $client = static::createClient();
        $em = $client->getContainer()->get('doctrine.orm.entity_manager');

        $articleRepository = $em->getRepository('pebBlogBundle:Article');
        $articles = $articleRepository->getPublishByTagLabel('Node');

        $this->assertEquals(1, sizeof($articles));

        $articles = $articleRepository->getPublishByTagLabel('CSS');

        $this->assertEquals(6, sizeof($articles));
    }

} 