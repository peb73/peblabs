<?php

namespace peb\velibBundle\Controller;

use peb\velibBundle\Entity\Station;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return new Response($this->get('pebvelib.dashboard')->action(Station::TYPE_HOME));
    }

    /**
     * @Route("/home")
     */
    public function homeAction()
    {
        return new Response($this->get('pebvelib.dashboard')->action(Station::TYPE_HOME));
    }

    /**
     * @Route("/work")
     */
    public function workAction()
    {
        return new Response($this->get('pebvelib.dashboard')->action(Station::TYPE_WORK));
    }
}
