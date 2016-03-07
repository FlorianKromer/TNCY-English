<?php

namespace TNCY\SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * MemoryItem
 *
 * @ORM\Table(name="ex_memory_item")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class MemoryItem
{
    const SERVER_PATH_TO_IMAGE_FOLDER = '..//web//uploads//memory';

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
     * @ORM\Column(name="img", type="text")
     */
    private $img;

    /**
    * @ORM\ManyToOne(targetEntity="Memory",inversedBy="items",cascade={"persist"})
    * @ORM\JoinColumn(name="memory_id", referencedColumnName="id",nullable=false)
    */
    protected $topic;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * Unmapped property to handle file uploads
     */
    private $file;

    function __construct($foo = null) {
        $this->updated_at = new \DateTime();
    }

    /**
    * Manages the copying of the file to the relevant place on the server
    */
    public function upload()
    {

    // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

    // we use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and target filename as params
    try {
        $location = MemoryItem::SERVER_PATH_TO_IMAGE_FOLDER.'//'.$this->topic;
        $this->getFile()->move($location,$this->getFile()->getClientOriginalName());
    } catch (\Exception $e) {
        var_dump($e);
        die();
    }

        

    // set the path property to the filename where you've saved the file
        $this->img = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }

    /**
    * Lifecycle callback to upload the file to the server
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */
    public function lifecycleFileUpload() {
        $this->upload();
    }

    /**
    * Updates the hash value to force the preUpdate and postUpdate events to fire
    */
    public function refreshUpdated() {
        $this->setUpdatedAt(new \DateTime("now"));
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
     * @return Memory
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
     * Set img
     *
     * @param string $img
     *
     * @return Memory
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set topic
     *
     * @param \TNCY\SchoolBundle\Entity\Memory $topic
     *
     * @return MemoryItem
     */
    public function setTopic(\TNCY\SchoolBundle\Entity\Memory $topic = null)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * Get topic
     *
     * @return \TNCY\SchoolBundle\Entity\Memory
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Lesson
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
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    

}
