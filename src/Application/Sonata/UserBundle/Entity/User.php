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


/** 
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"student" = "TNCY\SchoolBundle\Entity\Student", "teacher" = "TNCY\SchoolBundle\Entity\Teacher", "user" = "User"})
 * @ORM\Table(name="fos_user_user")
 */
class User extends BaseUser
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    // /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    // protected $facebook_id;
    // /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    // protected $facebook_access_token;
    // /** @ORM\Column(name="google_id", type="string", length=255, nullable=true) */
    // protected $google_id;
    // /** @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) */
    // protected $google_access_token;

    

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

    
}
