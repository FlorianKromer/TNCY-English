<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="song")
 * @ORM\Entity
 */
class Song
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="artist", type="string", length=255)
     */
    private $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="soundCloundTrackEmbed", type="text")
     */
    private $soundCloundTrackEmbed;

    /**
     * @var array
     *
     * @ORM\Column(name="gaps", type="array", length=255)
     */
    private $gaps;

    /**
     * @var string
     *
     * @ORM\Column(name="lyrics", type="text")
     */
    private $lyrics;



    /**
     * @var datetime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;
    
    /**
    * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
    * @ORM\JoinColumn(nullable=false)
    */
    private $author;

    function __toString()
    {
        return $this->name.' by '.$this->artist;
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
}
