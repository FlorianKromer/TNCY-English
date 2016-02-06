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
 * Student
 *
 * @ORM\Entity
 */
class Student extends BaseUser
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
   * @ORM\ManyToOne(targetEntity="SchoolClass")
   * @ORM\JoinColumn(nullable=true)
   */
    protected $schoolClass;


    public function __construct()
    {
        parent::__construct();
    }
    


    /**
     * Set schoolClass
     *
     * @param \TNCY\SchoolBundle\Entity\SchoolClass $schoolClass
     * @return User
     */
    public function setSchoolClass(\TNCY\SchoolBundle\Entity\SchoolClass $schoolClass = null)
    {
        $this->schoolClass = $schoolClass;

        return $this;
    }

    /**
     * Get schoolClass
     *
     * @return \TNCY\SchoolBundle\Entity\SchoolClass 
     */
    public function getSchoolClass()
    {
        return $this->schoolClass;
    }

   

    /**
     * Set facebookId
     *
     * @param string $facebookId
     *
     * @return Student
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
     * @return Student
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
     * @return Student
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
     * @return Student
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
