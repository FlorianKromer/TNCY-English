<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Homework
 *
 * @ORM\Table(name="exerciceresult")
 * @ORM\Entity
 */
class ExerciceResult
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
    * @ORM\ManyToOne(targetEntity="Student")
    */
    protected $student;

    /**
    * @ORM\ManyToOne(targetEntity="Homework")
    */
    protected $homework;


    /**
    * @ORM\ManyToOne(targetEntity="ExerciceAbstract")
    */
    protected $exercice;

    /**
     * @var string
     *
     * @ORM\Column(name="result", type="string", length=255)
     */
    private $result;

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
     * Set student
     *
     * @param \TNCY\SchoolBundle\Entity\Student $student
     *
     * @return ExerciceResult
     */
    public function setStudent(\TNCY\SchoolBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \TNCY\SchoolBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set homework
     *
     * @param \TNCY\SchoolBundle\Entity\Homework $homework
     *
     * @return ExerciceResult
     */
    public function setHomework(\TNCY\SchoolBundle\Entity\Homework $homework = null)
    {
        $this->homework = $homework;

        return $this;
    }

    /**
     * Get homework
     *
     * @return \TNCY\SchoolBundle\Entity\Homework
     */
    public function getHomework()
    {
        return $this->homework;
    }

    /**
     * Set exercice
     *
     * @param \TNCY\SchoolBundle\Entity\ExerciceAbstract $exercice
     *
     * @return ExerciceResult
     */
    public function setExercice(\TNCY\SchoolBundle\Entity\ExerciceAbstract $exercice = null)
    {
        $this->exercice = $exercice;

        return $this;
    }

    /**
     * Get exercice
     *
     * @return \TNCY\SchoolBundle\Entity\ExerciceAbstract
     */
    public function getExercice()
    {
        return $this->exercice;
    }

    /**
     * Set result
     *
     * @param string $result
     *
     * @return ExerciceResult
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }
}
