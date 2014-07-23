<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 23/07/2014
 * Time: 22:40
 */

namespace peb\BlogBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller{

    /**
     * @Route("/admin")
     */
    public function homeAction()
    {
        return $this->render('pebBlogBundle:Admin:home.html.twig');
        //TODO
    }
} 