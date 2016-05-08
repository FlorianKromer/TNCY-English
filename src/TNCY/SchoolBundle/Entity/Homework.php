<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use TNCY\SchoolBundle\Entity\ExerciceResult as ExerciceResult;

/**
 * Homework
 *
 * @ORM\Table(name="homework")
 * @ORM\Entity
 *  @ORM\HasLifecycleCallbacks()
 */
class Homework
{


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;


    /**
     * @var text
     *
     * @ORM\Column(name="content", type="text")
     */
    protected $content;

    /**
    * @ORM\ManyToMany(targetEntity="SchoolClass", cascade={"persist"})
    */
    protected $schoolClasses;


    /**
    * @ORM\ManyToMany(targetEntity="ExerciceAbstract", cascade={"persist"})
    */
    protected $exercices;

    /**
     * @var datetime
     *
     * @ORM\Column(name="due_date", type="datetime")
     */
    protected $due_date;

    /**
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=255)
     */
    // private $topic;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $created_at;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updated_at;

    /**
    * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $author;

    // public static  $CONST_TOPIC = array('GRAMMAR'=>'GRAMMAR','ORTHOGRAPH'=>'ORTHOGRAPH','VOCABULARY'=>'VOCABULARY','CONJUGATION'=>'CONJUGATION');

    function __construct($foo = null) {
        $this->created_at = new \DateTime();
        $this->updated_at = new \DateTime();
        $this->due_date = new \DateTime();
        $this->schoolClasses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->exercices = new \Doctrine\Common\Collections\ArrayCollection();
    }


    function __toString()
    {
        return $this->name;
    }


    /**
     * @ORM\PostPersist
     */
    public function createExerciceResult($args)
    {
        $em = $args->getEntityManager();
        foreach ($this->schoolClasses as $classes) {
            foreach ($classes->getStudents() as  $student) {
                foreach ($this->exercices as $exo) {
                    $r = new ExerciceResult();
                    $r->setStudent($student);
                    $r->setHomework($this);
                    $r->setExercice($exo);
                    $em->persist($r);

                }
            }
        }
        $em->flush();
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
     *
     * @return Homework
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
     * Set content
     *
     * @param string $content
     *
     * @return Homework
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     *
     * @return Homework
     */
    public function setDueDate($dueDate)
    {
        $this->due_date = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * Set topic
     *
     * @param string $topic
     *
     * @return Homework
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Homework
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
     * Add schoolClass
     *
     * @param \TNCY\SchoolBundle\Entity\SchoolClass $schoolClass
     *
     * @return Homework
     */
    public function addSchoolClass(\TNCY\SchoolBundle\Entity\SchoolClass $schoolClass)
    {
        $this->schoolClasses[] = $schoolClass;

        return $this;
    }

    /**
     * Remove schoolClass
     *
     * @param \TNCY\SchoolBundle\Entity\SchoolClass $schoolClass
     */
    public function removeSchoolClass(\TNCY\SchoolBundle\Entity\SchoolClass $schoolClass)
    {
        $this->schoolClasses->removeElement($schoolClass);
    }

    /**
     * Get schoolClasses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchoolClasses()
    {
        return $this->schoolClasses;
    }

    /**
     * Set author
     *
     * @param \Application\Sonata\UserBundle\Entity\User $author
     *
     * @return Homework
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

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Homework
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
     * Add exercice
     *
     * @param \TNCY\SchoolBundle\Entity\ExerciceAbstract $exercice
     *
     * @return Homework
     */
    public function addExercice(\TNCY\SchoolBundle\Entity\ExerciceAbstract $exercice)
    {
        $this->exercices[] = $exercice;

        return $this;
    }

    /**
     * Remove exercice
     *
     * @param \TNCY\SchoolBundle\Entity\ExerciceAbstract $exercice
     */
    public function removeExercice(\TNCY\SchoolBundle\Entity\ExerciceAbstract $exercice)
    {
        $this->exercices->removeElement($exercice);
    }

    /**
     * Get exercices
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExercices()
    {
        return $this->exercices;
    }
}
