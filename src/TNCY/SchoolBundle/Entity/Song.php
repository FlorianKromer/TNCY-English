<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use TNCY\SchoolBundle\Entity\ExerciceAbstract ;

/**
 * Song
 * @ORM\Entity
 */
class Song extends ExerciceAbstract
{


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="artist", type="string", length=255)
     */
    protected $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="soundCloundTrackEmbed", type="text")
     */
    protected $soundCloundTrackEmbed;

    /**
     * @var array
     *
     * @ORM\Column(name="gaps", type="array", length=255)
     */
    protected $gaps;

    /**
     * @var string
     *
     * @ORM\Column(name="lyrics", type="text")
     */
    protected $lyrics;




    function __construct($foo = null) {
        parent::__construct();
    }


    function __toString()
    {
        return $this->name.' by '.$this->artist;
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Song
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
     * Set artist
     *
     * @param string $artist
     *
     * @return Song
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set soundCloundTrackEmbed
     *
     * @param string $soundCloundTrackEmbed
     *
     * @return Song
     */
    public function setSoundCloundTrackEmbed($soundCloundTrackEmbed)
    {
        $this->soundCloundTrackEmbed = $soundCloundTrackEmbed;

        return $this;
    }

    /**
     * Get soundCloundTrackEmbed
     *
     * @return string
     */
    public function getSoundCloundTrackEmbed()
    {
        return $this->soundCloundTrackEmbed;
    }

    /**
     * Set gaps
     *
     * @param array $gaps
     *
     * @return Song
     */
    public function setGaps($gaps)
    {
        $this->gaps = $gaps;

        return $this;
    }

    /**
     * Get gaps
     *
     * @return array
     */
    public function getGaps()
    {
        return $this->gaps;
    }

    /**
     * Set lyrics
     *
     * @param string $lyrics
     *
     * @return Song
     */
    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;

        return $this;
    }

    /**
     * Get lyrics
     *
     * @return string
     */
    public function getLyrics()
    {
        return $this->lyrics;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Song
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Song
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
     * Set author
     *
     * @param \Application\Sonata\UserBundle\Entity\User $author
     *
     * @return Song
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
}
