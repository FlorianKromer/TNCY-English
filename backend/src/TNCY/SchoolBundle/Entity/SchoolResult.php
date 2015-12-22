<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\UserBundle\Entity\User;
/**
 * SchoolResult
 *
 * @ORM\Table(name="schoolresult")
 * @ORM\Entity
 */
class SchoolResult
{
    public static  $AFFINITY = array('VERY GOOD'=>'VERY GOOD','GOOD'=>'GOOD','INTERMEDIATE'=>'INTERMEDIATE','NOOB'=>'NOOB');

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Subject")
     * @ORM\JoinColumn(name="subject_id", referencedColumnName="id")
     **/
    private $subject;

    /**
     * @ORM\OneToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="affinity", type="string", length=255,nullable=true)
     */
    private $affinity;

    /**
     * @var decimal
     *
     * @ORM\Column(name="average", type="decimal",nullable=true)
     */
    private $average;

    /**
     * @return decimal
     */
    public function getAverage()
    {
        return $this->average;
    }

    /**
     * @param decimal $average
     */
    public function setAverage($average)
    {
        $this->average = $average;
    }

    /**
     * @return string
     */
    public function getAffinity()
    {
        return $this->affinity;
    }

    /**
     * @param string $affinity
     */
    public function setAffinity($affinity)
    {
        $this->affinity = $affinity;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}