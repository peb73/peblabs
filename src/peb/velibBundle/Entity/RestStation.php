<?php
/**
 * Created by PhpStorm.
 * User: pierre-emmanueboiteau
 * Date: 08/06/2014
 * Time: 11:54
 */

namespace peb\velibBundle\Entity;


class RestStation {

    public $number;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $contractName;

    /**
     * @var string
     */
    public $positionLat;

    /**
     * @var string
     */
    public $positionLng;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $priority=0;

    /**
     * @var integer
     */
    public $availableBikeStands;

    /**
     * @var integer
     */
    public $availableBikes;

    /**
     * @var \DateTime
     */
    public $date;

    /**
     * @param Station $station
     */
    public function __construct(Station $station){

        $this->address = $station->getAddress();
        $this->contractName = $station->getContractName();
        $this->name = $station->getName();
        $this->number = $station->getNumber();
        $this->positionLat = $station->getPositionLat();
        $this->positionLng = $station->getPositionLng();
        $this->status = $station->getStatus();
        $this->type = $station->getType();

        $info = $station->getInfos()->last();
        $this->availableBikes = $info->getAvailableBikes();
        $this->availableBikeStands = $info->getAvailableBikeStands();
        $this->date = $info->getDate();
    }
} 