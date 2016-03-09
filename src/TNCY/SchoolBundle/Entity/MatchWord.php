<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * matchWord
 *
 * @ORM\Table(name="match_word")
 * @ORM\Entity
 */
class MatchWord
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
     * @ORM\Column(name="start", type="string", length=255)
     */
    private $start;


    /**
     * @var string
     *
     * @ORM\Column(name="end", type="string", length=255)
     */
    private $end;

    /**
   * @ORM\ManyToOne(targetEntity="VocTopic")
   * @ORM\JoinColumn(nullable=true)
   */
    protected $vocTopic;



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
     * Set start
     *
     * @param string $start
     *
     * @return MatchWord
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param string $end
     *
     * @return MatchWord
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return string
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set vocTopic
     *
     * @param \TNCY\SchoolBundle\Entity\VocTopic $vocTopic
     *
     * @return MatchWord
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

}
