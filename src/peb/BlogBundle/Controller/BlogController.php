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
     * @Route("/blog/category/{category}")
     */
    public function articlesCategoryAction($category)
    {
        //TODO
    }

    /**
     * @Route("/blog/tag/{tag}")
     */
    public function ArticlesTagsAction($tag)
    {
        //TODO
    }


} 