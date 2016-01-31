<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace TNCY\SchoolBundle\Entity;

use Application\Sonata\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use TNCY\SchoolBundle\Entity\SchoolClass as SchoolClass;


/**
 * Teacher
 *
 * @ORM\Entity
 */
class Teacher extends BaseUser
{

     /**
   * @ORM\ManyToMany(targetEntity="SchoolClass", cascade={"persist"})
   */
    protected $schoolClasses;
    

    public function __construct()
    {
        parent::__construct();
        $this->schoolClasses = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set schoolClass
     *
     * @param \TNCY\SchoolBundle\Entity\SchoolClass $schoolClass
     * @return User
     */
    public function setSchoolClass(\TNCY\SchoolBundle\Entity\SchoolClass $schoolClasses = null)
    {
        $this->schoolClasses = $schoolClasses;

        return $this;
    }

    /**
     * Get schoolClass
     *
     * @return \TNCY\SchoolBundle\Entity\SchoolClass 
     */
    public function getSchoolClass()
    {
        return $this->schoolClasses;
    }

   

    /**
     * Add schoolClass
     *
     * @param \TNCY\SchoolBundle\Entity\SchoolClass $schoolClass
     *
     * @return Teacher
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
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return Teacher
     */
    public function setFacebookId($facebookId)
    {
        $this->facebook_id = $facebookId;

        return $this;
    }

    /**
     * Get facebookId
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    /**
     * Set facebookAccessToken
     *
     * @param string $facebookAccessToken
     *
     * @return Teacher
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebook_access_token = $facebookAccessToken;

        return $this;
    }

    /**
     * Get facebookAccessToken
     *
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

    /**
     * Set googleId
     *
     * @param string $googleId
     *
     * @return Teacher
     */
    public function setGoogleId($googleId)
    {
        $this->google_id = $googleId;

        return $this;
    }

    /**
     * Get googleId
     *
     * @return string
     */
    public function getGoogleId()
    {
        return $this->google_id;
    }

    /**
     * Set googleAccessToken
     *
     * @param string $googleAccessToken
     *
     * @return Teacher
     */
    public function setGoogleAccessToken($googleAccessToken)
    {
        $this->google_access_token = $googleAccessToken;

        return $this;
    }

    /**
     * Get googleAccessToken
     *
     * @return string
     */
    public function getGoogleAccessToken()
    {
        return $this->google_access_token;
    }
}
