<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 23/06/2014
 * Time: 23:33
 */

namespace peb\HomeBundle\Service;


use Symfony\Bridge\Twig\TwigEngine;

class HomeService {

    /**
     * @var TwigEngine
     */
    private $twigEngine;

    /**
     * @param TwigEngine $twigEngine
     */
    public function __construct(TwigEngine $twigEngine)
    {
        $this->twigEngine = $twigEngine;
    }

    /**
     * @return string
     */
    public function action()
    {
        return $this->twigEngine->render('pebHomeBundle:Home:home.html.twig', array('type'=>'home'));
    }

} 