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
    * @ORM\ManyToOne(targetEntity="ExerciceMatch",inversedBy="items",cascade={"persist"})
    * @ORM\JoinColumn(name="match_id", referencedColumnName="id",nullable=true)
    */
    protected $exercice;



    public function __toString()
    {
        return $this->start."->" . $this->end;
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
     * Set exercice
     *
     * @param \TNCY\SchoolBundle\Entity\ExerciceMatch $exercice
     *
     * @return MatchWord
     */
    public function setExercice(\TNCY\SchoolBundle\Entity\ExerciceMatch $exercice = null)
    {
        $this->exercice = $exercice;

        return $this;
    }

    /**
     * Get exercice
     *
     * @return \TNCY\SchoolBundle\Entity\ExerciceMatch
     */
    public function getExercice()
    {
        return $this->exercice;
    }
}
