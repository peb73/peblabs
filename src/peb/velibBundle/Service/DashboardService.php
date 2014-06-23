<?php
namespace peb\velibBundle\Service;


use Doctrine\ORM\EntityManager;
use peb\velibBundle\Entity\Station;
use peb\velibBundle\Entity\StationRepository;
use Symfony\Bridge\Twig\TwigEngine;

class DashboardService {
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var StationRepository
     */
    private $stationRepository;

    /**
     * @var TwigEngine
     */
    private $twigEnvironment;

    /**
     * @var string
     */
    private $googleApiKey;

    /**
     * @var array
     */
    private $coordMatin;

    /**
     * @var array
     */
    private $coordSoir;

    /**
     * @param EntityManager $em
     * @param TwigEngine $twigEnvironment
     * @param string $googleApiKey
     */
    public function __construct(EntityManager $em, TwigEngine $twigEnvironment, $googleApiKey, $coordMatin, $coordSoir){
        $this->em = $em;
        $this->stationRepository = $em->getRepository('pebvelibBundle:Station');
        $this->twigEnvironment = $twigEnvironment;
        $this->googleApiKey = $googleApiKey;
        $this->coordMatin = $coordMatin;
        $this->coordSoir = $coordSoir;
    }

    /**
     * @param string $type
     * @return string
     */
    public function action($type)
    {
        $stations = $this->stationRepository->findBy(array('type'=>$type));
        switch($type){
            case 1:
                $coord = $this->coordSoir;
                break;
            case 0:
            default:
                $coord = $this->coordMatin;
                break;
        }
        return $this->twigEnvironment->render('pebvelibBundle:Dashboard:index.html.twig', array('stations'=>$stations, 'type'=>$type, 'googleApiKey'=>$this->googleApiKey, 'coord'=>$coord));
    }
} 