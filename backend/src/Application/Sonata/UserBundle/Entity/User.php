<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use TNCY\SchoolBundle\Entity\SchoolClass as SchoolClass;



class User extends BaseUser
{
    /**
     * @var integer $id
     */
    protected $id;

    protected $github;

    protected $schoolClass;

    protected $avatar;

    protected $background;

    protected $githubId;
    


    public function __construct()
    {
        parent::__construct();
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
     * Set github
     *
     * @param string $github
     * @return User
     */
    public function setGithub($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get github
     *
     * @return string 
     */
    public function getGithub()
    {
        return $this->github;
    }

    /**
     * Set github
     *
     * @param string $github
     * @return User
     */
    public function setGithubId($github)
    {
        $this->github = $github;

        return $this;
    }

    /**
     * Get github
     *
     * @return string 
     */
    public function getGithubId()
    {
        return $this->github;
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
     * Set avatar
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $avatar
     * @return User
     */
    public function setAvatar(\Application\Sonata\MediaBundle\Entity\Media $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set background
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $background
     * @return User
     */
    public function setBackground(\Application\Sonata\MediaBundle\Entity\Media $background = null)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getBackground()
    {
        return $this->background;
    }

   
}
