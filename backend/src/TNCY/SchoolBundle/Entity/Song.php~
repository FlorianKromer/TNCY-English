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
     * @ORM\Column(name="soundCloundTrackId", type="string", length=255)
     */
    private $soundCloundTrackId;

    /**
     * @var array
     *
     * @ORM\Column(name="gaps", type="array", length=255)
     */
    private $gaps;






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
     * Set soundCloundTrackId
     *
     * @param string $soundCloundTrackId
     *
     * @return Song
     */
    public function setSoundCloundTrackId($soundCloundTrackId)
    {
        $this->soundCloundTrackId = $soundCloundTrackId;

        return $this;
    }

    /**
     * Get soundCloundTrackId
     *
     * @return string
     */
    public function getSoundCloundTrackId()
    {
        return $this->soundCloundTrackId;
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
}
