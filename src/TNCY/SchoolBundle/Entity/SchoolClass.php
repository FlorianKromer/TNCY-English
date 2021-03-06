<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Application\Sonata\UserBundle\Entity\Group as BaseGroup;
/**
 * SchoolClass
 *
 * @ORM\Table(name="schoolclass")
 * @ORM\Entity
 */
class SchoolClass extends BaseGroup
{



    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=20)
     */
    private $code;

    /**
     * @ORM\ManyToMany(targetEntity="Subject", mappedBy="schoolclasses")
     **/
    private $subjects;


    /**
   * @ORM\ManyToOne(targetEntity="School")
   * @ORM\JoinColumn(nullable=true)
   */
    protected $school;

    /**
     * @ORM\OneToMany(targetEntity="Student", mappedBy="schoolClass")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $students;

    public function __construct()
    {
        $this->subjects = new \Doctrine\Common\Collections\ArrayCollection();
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
    }

    function __toString()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * @param mixed $subjects
     */
    public function setStudents($students)
    {
        $this->students = $students;
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

    /**
     * Set code
     *
     * @param string $code
     *
     * @return SchoolClass
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add student
     *
     * @param \TNCY\SchoolBundle\Entity\Student $student
     *
     * @return SchoolClass
     */
    public function addStudent(\TNCY\SchoolBundle\Entity\Student $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \TNCY\SchoolBundle\Entity\Student $student
     */
    public function removeStudent(\TNCY\SchoolBundle\Entity\Student $student)
    {
        $this->students->removeElement($student);
    }
}
