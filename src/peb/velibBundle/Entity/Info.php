<?php

namespace peb\velibBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Info
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="peb\velibBundle\Entity\InfoRepository")
 */
class Info
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="available_bike_stands", type="integer")
     */
    private $availableBikeStands;

    /**
     * @var integer
     *
     * @ORM\Column(name="available_bikes", type="integer")
     */
    private $availableBikes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var Station
     *
     * @ORM\ManyToOne(targetEntity="Station", inversedBy="infos")
     * @ORM\JoinColumn(name="station_number", referencedColumnName="number")
     */
    private $station;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set availableBikeStands
     *
     * @param integer $availableBikeStands
     * @return Info
     */
    public function setAvailableBikeStands($availableBikeStands)
    {
        $this->availableBikeStands = $availableBikeStands;

        return $this;
    }

    /**
     * Get availableBikeStands
     *
     * @return integer 
     */
    public function getAvailableBikeStands()
    {
        return $this->availableBikeStands;
    }

    /**
     * Set availableBikes
     *
     * @param integer $availableBikes
     * @return Info
     */
    public function setAvailableBikes($availableBikes)
    {
        $this->availableBikes = $availableBikes;

        return $this;
    }

    /**
     * Get availableBikes
     *
     * @return integer 
     */
    public function getAvailableBikes()
    {
        return $this->availableBikes;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Info
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param Station $station
     * @return Info
     */
    public function setStation(Station $station)
    {
        $this->station = $station;

        return $this;
    }

    public function getStation()
    {
        return $this->station;
    }
}
