<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memory
 *
 * @ORM\Table(name="ex_memory")
 * @ORM\Entity
 */
class Memory
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
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=255)
     */
    private $topic;


 	/**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


    /**
     * @ORM\OneToMany(targetEntity="MemoryItem", mappedBy="topic",cascade={"persist"})
     */
    private $items;

    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get topic
     *
     * @return string
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Memory
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Add item
     *
     * @param \TNCY\SchoolBundle\Entity\MemoryItem $item
     *
     * @return Memory
     */
    public function addItem(\TNCY\SchoolBundle\Entity\MemoryItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \TNCY\SchoolBundle\Entity\MemoryItem $item
     */
    public function removeItem(\TNCY\SchoolBundle\Entity\MemoryItem $item)
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
