<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subject
 *
 * @ORM\Table(name="subject")
 * @ORM\Entity
 */
class Subject
{
    public static  $THEMES = array('SEHS'=>'SEHS','STIC'=>'STIC','SFA'=>'SFA');


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
     * @ORM\Column(name="theme", type="string", length=255)
     */
    private $theme;

    /**
     * @ORM\ManyToMany(targetEntity="SchoolClass", inversedBy="subjects")
     * @ORM\JoinTable(name="subject_schoolclass")
     **/
    private $schoolclasses;


    public function __construct() {
        $this->schoolclasses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    function __toString()
    {
        return $this->name.'('.$this->theme.')';
    }


    /**
     * @return mixed
     */
    public function getSchoolclasses()
    {
        return $this->schoolclasses;
    }

    /**
     * @param mixed $schoolclasses
     */
    public function setSchoolclasses($schoolclasses)
    {
        $this->schoolclasses = $schoolclasses;
    }

    /**
     * @return string
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param string $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
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


}
