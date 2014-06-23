<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 08/06/2014
 * Time: 11:43
 */

namespace peb\velibBundle\Service;


use Doctrine\ORM\EntityManager;
use peb\velibBundle\Entity\RestStation;
use peb\velibBundle\Entity\StationRepository;

class ApiService {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var StationRepository
     */
    private $stationRepository;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->stationRepository = $em->getRepository('pebvelibBundle:Station');
    }

    public function getStations($type = null)
    {
        $result = array();

        $stations = null;

        if($type === null){
            $stations = $this->stationRepository->findAll();
        }else{
            $stations = $this->stationRepository->findBy(array('type'=>$type));
        }

        foreach($stations as $station){
            $result[] = new RestStation($station);
        }

        return $result;
    }

    public function getStationsStats($number)
    {
        return $this->stationRepository->getStats($number);
    }
} 