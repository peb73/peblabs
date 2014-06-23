<?php

namespace peb\velibBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use GuzzleHttp\Client;
use peb\velibBundle\Entity\Info;
use peb\velibBundle\Entity\Station;

/**
 * Class UpdateService
 *
 * @package peb\velibBundle\Service
 */
class UpdateService {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var EntityRepository
     */
    private $stationRepository;

    /**
     * @var string
     */
    private $apikey;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em, $apiKey)
    {
        $this->em = $em;
        $this->stationRepository = $this->em->getRepository('pebvelibBundle:Station');
        $this->apikey = $apiKey;
    }

    public function run(){
        $this->process(array(18041, 18004, 18005, 18042, 9018), Station::TYPE_HOME);
        $this->process(array(20038,20117,20110, 19037,19040), Station::TYPE_WORK);
    }

    private function process($stations, $type){
        $client = new Client();

        foreach($stations as $number){

            $response = $client->get(sprintf('https://api.jcdecaux.com/vls/v1/stations/%s?contract=Paris&apiKey=%s',$number, $this->apikey), [
                'headers' => ['Content-Type' => 'application/json']
            ]);

            if(200 == $response->getStatusCode()){

                $json = $response->json();
                //die(var_dump($json));
                //get Station
                if(null == ($station = $this->stationRepository->findOneBy(array('number'=>$json['number'])))){
                    $station = new Station();
                    $station->setNumber($json['number']);
                    $station->setName($json['name']);
                    $station->setAddress($json['address']);
                    $station->setContractName($json['contract_name']);
                    $station->setPositionLat($json['position']['lat']);
                    $station->setPositionLng($json['position']['lng']);
                    $station->setStatus($json['status']);
                    $station->setType($type);
                    $this->em->persist($station);
                }else{
                    $station->setStatus($json['status']);
                }

                //get Info
                $info = new Info();
                $info->setDate(new \DateTime());
                $info->setAvailableBikes($json['available_bikes']);
                $info->setAvailableBikeStands($json['available_bike_stands']);
                $info->setStation($station);
                $this->em->persist($info);

                $station->addInfo($info);

                $this->em->flush();
            }
        }
    }
} 