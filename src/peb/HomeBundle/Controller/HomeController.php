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
    public function indexAction()
    {
        return new Response($this->get('pebHome.home')->action());
    }

} 