<?php

namespace peb\velibBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Station
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="peb\velibBundle\Entity\StationRepository")
 */
class Station
{

    const TYPE_HOME = 0;
    const TYPE_WORK = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     * @ORM\Id
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="contract_name", type="string", length=255)
     */
    private $contractName;

    /**
     * @var string
     *
     * @ORM\Column(name="position_lat", type="string")
     */
    private $positionLat;

    /**
     * @var string
     *
     * @ORM\Column(name="position_lng", type="string")
     */
    private $positionLng;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var Info[]
     *
     * @ORM\OneToMany(targetEntity="Info", mappedBy="station")
     */
    private $infos;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type = Station::TYPE_HOME;

    /**
     * @var int
     *
     * @ORM\Column(name="priority", type="integer")
     */
    private $priority=0;

    public function __construct()
    {
        $this->infos = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Station
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Station
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set contractName
     *
     * @param string $contractName
     * @return Station
     */
    public function setContractName($contractName)
    {
        $this->contractName = $contractName;

        return $this;
    }

    /**
     * Get contractName
     *
     * @return string 
     */
    public function getContractName()
    {
        return $this->contractName;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Station
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set positionLat
     *
     * @param string $positionLat
     * @return Station
     */
    public function setPositionLat($positionLat)
    {
        $this->positionLat = $positionLat;

        return $this;
    }

    /**
     * Get positionLat
     *
     * @return string 
     */
    public function getPositionLat()
    {
        return $this->positionLat;
    }

    /**
     * Set positionLng
     *
     * @param string $positionLng
     * @return Station
     */
    public function setPositionLng($positionLng)
    {
        $this->positionLng = $positionLng;

        return $this;
    }

    /**
     * Get positionLng
     *
     * @return string 
     */
    public function getPositionLng()
    {
        return $this->positionLng;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Station
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Info $info
     * @return Station
     */
    public function addInfo(Info $info)
    {
        $this->infos->add($info);

        return $this;
    }

    /**
     * @return ArrayCollection|Info[]
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * @return int
     */
    public function getLastAvailableBikes()
    {
        if(sizeof($this->infos)<=0){
            return -1;
        }

        return $this->infos->last()->getAvailableBikes();
    }

    /**
     * @param string $type
     * @return Station
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $priority
     * @return Station
     */
    public function setPriotity($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
