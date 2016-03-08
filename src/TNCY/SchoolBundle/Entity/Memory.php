<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use TNCY\SchoolBundle\Entity\ExerciceAbstract ;
/**
 * Memory
 *
 * @ORM\Entity
 */
class Memory extends ExerciceAbstract
{

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
        parent::__construct();
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }
     

    function __toString()
    {
        return $this->topic;
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
        $item->setTopic($this);

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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Memory
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Memory
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set author
     *
     * @param \Application\Sonata\UserBundle\Entity\User $author
     *
     * @return Memory
     */
    public function setAuthor(\Application\Sonata\UserBundle\Entity\User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
