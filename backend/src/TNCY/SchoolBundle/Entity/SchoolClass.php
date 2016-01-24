<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SchoolClass
 *
 * @ORM\Table(name="schoolclass")
 * @ORM\Entity
 */
class SchoolClass
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
     * @ORM\ManyToMany(targetEntity="Subject", mappedBy="schoolclasses")
     **/
    private $subjects;


    /**
   * @ORM\ManyToOne(targetEntity="School")
   * @ORM\JoinColumn(nullable=true)
   */
    protected $school;


    public function __construct()
    {
        $this->subjects = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * @param mixed $subjects
     */
    public function setSubjects($subjects)
    {
        $this->subjects = $subjects;
    }


    function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     * @return Subject
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
     * Add subject
     *
     * @param \TNCY\SchoolBundle\Entity\Subject $subject
     *
     * @return SchoolClass
     */
    public function addSubject(\TNCY\SchoolBundle\Entity\Subject $subject)
    {
        $this->subjects[] = $subject;

        return $this;
    }

    /**
     * Remove subject
     *
     * @param \TNCY\SchoolBundle\Entity\Subject $subject
     */
    public function removeSubject(\TNCY\SchoolBundle\Entity\Subject $subject)
    {
        $this->subjects->removeElement($subject);
    }

    /**
     * Set school
     *
     * @param \TNCY\SchoolBundle\Entity\School $school
     *
     * @return SchoolClass
     */
    public function setSchool(\TNCY\SchoolBundle\Entity\School $school = null)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return \TNCY\SchoolBundle\Entity\School
     */
    public function getSchool()
    {
        return $this->school;
    }
}
