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

   
}
