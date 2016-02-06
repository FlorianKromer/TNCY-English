<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="spelling")
 * @ORM\Entity
 */
class Spelling
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
     * @ORM\Column(name="original", type="string", length=255)
     */
    private $original;


    /**
     * @var string
     *
     * @ORM\Column(name="proposals", type="array", length=255)
     */
    private $proposals;


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
     * Set original
     *
     * @param string $original
     *
     * @return Spelling
     */
    public function setOriginal($original)
    {
        $this->original = $original;

        return $this;
    }

    /**
     * Get original
     *
     * @return string
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * Set proposals
     *
     * @param array $proposals
     *
     * @return Spelling
     */
    public function setProposals($proposals)
    {
        $this->proposals = $proposals;

        return $this;
    }

    /**
     * Get proposals
     *
     * @return array
     */
    public function getProposals()
    {
        return $this->proposals;
    }
}
