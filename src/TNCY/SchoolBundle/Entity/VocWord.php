<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VocWord
 *
 * @ORM\Table(name="voc_word")
 * @ORM\Entity
 */
class VocWord
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
     * @ORM\Column(name="translated", type="string", length=255)
     */
    private $translated;

    /**
     * @var string
     *
     * @ORM\Column(name="exemple", type="string", length=255,nullable=true)
     */
    private $exemple;


    /**
   * @ORM\ManyToOne(targetEntity="VocTopic")
   * @ORM\JoinColumn(nullable=true)
   */
    protected $vocTopic;



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
     * @return VocWord
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
     * Set translated
     *
     * @param string $translated
     *
     * @return VocWord
     */
    public function setTranslated($translated)
    {
        $this->translated = $translated;

        return $this;
    }

    /**
     * Get translated
     *
     * @return string
     */
    public function getTranslated()
    {
        return $this->translated;
    }

    /**
     * Set exemple
     *
     * @param string $exemple
     *
     * @return VocWord
     */
    public function setExemple($exemple)
    {
        $this->exemple = $exemple;

        return $this;
    }

    /**
     * Get exemple
     *
     * @return string
     */
    public function getExemple()
    {
        return $this->exemple;
    }

    /**
     * Set vocTopic
     *
     * @param \TNCY\SchoolBundle\Entity\VocTopic $vocTopic
     *
     * @return VocWord
     */
    public function setVocTopic(\TNCY\SchoolBundle\Entity\VocTopic $vocTopic = null)
    {
        $this->vocTopic = $vocTopic;

        return $this;
    }

    /**
     * Get vocTopic
     *
     * @return \TNCY\SchoolBundle\Entity\VocTopic
     */
    public function getVocTopic()
    {
        return $this->vocTopic;
    }

}
