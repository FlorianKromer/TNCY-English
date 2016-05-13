<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use TNCY\SchoolBundle\Entity\ExerciceAbstract ;

/**
 * ExerciceMatch
 * @ORM\Entity
 */
class ExerciceMatch extends ExerciceAbstract
{

	 /**
   * @ORM\ManyToOne(targetEntity="VocTopic")
   * @ORM\JoinColumn(nullable=true)
   */
    protected $vocTopic;

    /**
     * @ORM\OneToMany(targetEntity="MatchWord", mappedBy="exercice",cascade={"persist"})
     */
    protected $items;

	public function __construct()
    {
        parent::__construct();
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return isset($this->vocTopic) ? $this->vocTopic." (match)":"new match";
    }

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
     * Set topic
     *
     * @param string $topic
     *
     * @return Memory
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Set vocTopic
     *
     * @param \TNCY\SchoolBundle\Entity\VocTopic $vocTopic
     *
     * @return ExerciceMatch
     */
    public function setVocTopic(\TNCY\SchoolBundle\Entity\VocTopic $vocTopic = null)
    {
        $this->vocTopic = $vocTopic;

        return $this;
    }

    /**
     * Get vocTopic
     *
     * @return \TNCY\SchoolBundle\Entity\VocTopic
     */
    public function getVocTopic()
    {
        return $this->vocTopic;
    }

    /**
     * Add item
     *
     * @param \TNCY\SchoolBundle\Entity\MatchWord $item
     *
     * @return ExerciceMatch
     */
    public function addItem(\TNCY\SchoolBundle\Entity\MatchWord $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \TNCY\SchoolBundle\Entity\MatchWord $item
     */
    public function removeItem(\TNCY\SchoolBundle\Entity\MatchWord $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
