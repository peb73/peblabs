<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 08/06/2014
 * Time: 11:13
 */

namespace peb\velibBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller{

    /**
     * @Route("/api/stations")
     */
    public function getStations(Request $request){
        if(null === ($type = $request->get('type'))){
            return new JsonResponse($this->get('pebvelib.api')->getStations());
        }

        return new JsonResponse($this->get('pebvelib.api')->getStations($type));
    }

    /**
     * @Route(path="/api/stations/{number}/stats")
     */
    public function getStationsStats(Request $request, $number){
        $response = new JsonResponse($this->get('pebvelib.api')->getStationsStats($number));

        $response->setMaxAge(86400);

        return $response;
    }
} 