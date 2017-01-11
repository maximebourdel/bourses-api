<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Industry
 *
 * @ORM\Table(name="industry")
 * @ORM\Entity(repositoryClass="MainBundle\Repository\IndustryRepository")
 */
class Industry
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="short_name", type="string", length=50, unique=true)
     */
    private $shortName;

    /**
     * @var string
     *
     * @ORM\Column(name="long_name", type="string", length=255, nullable=true)
     */
    private $longName;


    /**
     * @var int
     *
     * @ORM\Column(name="numId", type="integer")
     */
    private $numId;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set shortName
     *
     * @param string $shortName
     *
     * @return Industry
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set longName
     *
     * @param string $longName
     *
     * @return Industry
     */
    public function setLongName($longName)
    {
        $this->longName = $longName;

        return $this;
    }

    /**
     * Get longName
     *
     * @return string
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Industry
     */
    public function setNumId($numId)
    {
        $this->numId = $numId;

        return $this;
    }

    /**
     * numId
     *
     * @return int
     */
    public function getNumId()
    {
        return $this->numId;
    }
}
