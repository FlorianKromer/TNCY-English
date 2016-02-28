<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MemoryItem
 *
 * @ORM\Table(name="ex_memory_item")
 * @ORM\Entity
 */
class MemoryItem
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="text")
     */
    private $img;

    /**
   * @ORM\ManyToOne(targetEntity="Memory")
   * @ORM\JoinColumn(nullable=true)
   */
    protected $topic;

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
     * Set name
     *
     * @param string $name
     *
     * @return Memory
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
     * Set img
     *
     * @param string $img
     *
     * @return Memory
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set topic
     *
     * @param \TNCY\SchoolBundle\Entity\Memory $topic
     *
     * @return MemoryItem
     */
    public function setTopic(\TNCY\SchoolBundle\Entity\Memory $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get topic
     *
     * @return \TNCY\SchoolBundle\Entity\Memory
     */
    public function getTopic()
    {
        return $this->topic;
    }
}
