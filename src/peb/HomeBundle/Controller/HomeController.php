<?php

namespace peb\HomeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 * @package peb\HomeBundle\Controller
 */
class HomeController extends Controller{

    /**
     * @Route("/")
     */
    public function homeAction()
    {
        $response = $this->forward('pebBlogBundle:Blog:articles', array());

        return $response;
    }

    /**
     * @Route("/lab")
     */
    public function labAction()
    {
        return new Response($this->get('pebHome.home')->action());
    }

} 