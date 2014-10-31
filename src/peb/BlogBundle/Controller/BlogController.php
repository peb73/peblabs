<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 22/07/2014
 * Time: 15:45
 */

namespace peb\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller{

    /**
     * @Route("/blog")
     */
    public function articlesAction()
    {
        return new Response($this->get('pebblog.article')->renderArticles());
    }

    /**
     * @Route("/blog/{id}", requirements={"id" = "\d+"})
     */
    public function articleAction($id)
    {
        //TODO
    }

    /**
     * @Route("/blog/category/{categoryUrl}")
     */
    public function articlesCategoryAction($categoryUrl)
    {
        return new Response($this->get('pebblog.category')->renderArticles($categoryUrl));
    }

    /**
     * @Route("/blog/tag/{tag}")
     */
    public function ArticlesTagsAction($tag)
    {
        return new Response($this->get('pebblog.tag')->renderArticles($tag));
    }


} 